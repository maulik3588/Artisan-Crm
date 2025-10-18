<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Services\SendGridService;
use Illuminate\Mail\Markdown;
use App\Mail\ConversationMail;
use App\Services\TwilioService;

class ConversationController extends Controller
{
    protected $sendGridService;
    protected $twilioService;

    public function __construct(SendGridService $sendGridService, TwilioService $twilioService)
    {
        $this->middleware('auth');
        $this->sendGridService = $sendGridService;
        $this->twilioService = $twilioService;
    }

    public function index(Request $request)
    {
        $conversations = Conversation::where('user_id', $request->user()->id)
            ->orderBy('created_at','desc')
            ->paginate(config('constants.PAGINATION_LIMIT'));

        return view('pages.conversations.index', compact('conversations'));
    }

    public function add(Request $request)
    {
        $customers = \App\Models\Customer::where('created_by', $request->user()->id)
            ->orderBy('name')
            ->get(['id','name','email','contact']);
        return view('pages.conversations.add', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'medium' => 'required|in:call,email,sms,whatsapp,meeting,other',
            'scheduled_at' => 'nullable|date',
            'send_to' => 'required|in:all,selected',
            'customer_ids' => 'nullable|array',
            'customer_ids.*' => 'exists:customers,id',
        ]);

        $conversation = Conversation::create([
            'user_id' => $request->user()->id,
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'medium' => $request->input('medium'),
            'scheduled_at' => $request->input('scheduled_at'),
        ]);

        $customerIds = [];
        if ($request->input('send_to') === 'all') {
            $customerIds = \App\Models\Customer::where('created_by', $request->user()->id)->pluck('id')->all();
        } else {
            $customerIds = $request->input('customer_ids', []);
        }

        if (!empty($customerIds)) {
            $conversation->customers()->sync($customerIds);
            
            // Send email to all customers if medium is email
            if ($request->input('medium') === 'email') {
                $customers = \App\Models\Customer::whereIn('id', $customerIds)->get();
                
                $mailable = new ConversationMail($conversation);
                $view = (string) $mailable->render();
                $subject = $mailable->envelope()->subject;

                foreach ($customers as $customer) {
                    if ($customer->email) {
                        try {
                            $this->sendGridService->sendEmail(
                               (string) $customer->email,
                                $subject,
                                $view
                            );
                        } catch (\Exception $e) {
                            \Log::error('Failed to send email to ' . $customer->email . ': ' . $e->getMessage());
                        }
                    }
                }
            }
            
            // Send SMS to all customers if medium is sms
            if ($request->input('medium') === 'sms') {
                $customers = \App\Models\Customer::whereIn('id', $customerIds)->get();
            
                foreach ($customers as $customer) {
                    if ($customer->contact) {
                        try {
                            $this->twilioService->sendSms(
                                (string) $customer->contact,
                                $conversation->message
                            );
                        } catch (\Exception $e) {
                            \Log::error('Failed to send SMS to ' . $customer->contact . ': ' . $e->getMessage());
                        }
                    }
                }
            }
        }

        \Session::flash('alert_msg', 'Conversation created successfully!');
        \Session::flash('alert_class', 'success');

        return redirect()->route('admin.conversations.index');
    }

    public function delete(Request $request, $id)
    {
        try {
            $conversation = Conversation::where('id', $id)
                ->where('user_id', $request->user()->id)
                ->firstOrFail();

            // Delete the conversation-customer relationships first
            $conversation->customers()->detach();
            
            // Delete the conversation
            $conversation->delete();

            return redirect()
                ->route('admin.conversations.index')
                ->with('alert_msg', 'Conversation deleted successfully!')
                ->with('alert_class', 'success');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert_msg', 'Error deleting conversation: ' . $e->getMessage())
                ->with('alert_class', 'danger');
        }
    }
}

    


