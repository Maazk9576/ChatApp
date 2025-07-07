<?php
namespace App\Livewire;

use App\Events\MessageSentEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{

    public $userId;
    public $user;
    public $message;
    public $sender_id;
    public $receiver_id;
    public $messages;

    public function mount($userId)
    {
        $this->user        = $this->getUser($userId);
        $this->sender_id   = Auth::user()->id;
        $this->receiver_id = $userId;
        $this->messages    = $this->getMessages();
        // dd($messages->toArray());

    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function getUser($userId)
    {
        return User::findOrFail($userId);

    }
    public function sendMessage()
    {
        $sentMessage = $this->saveMessage();
        //new meesage appending
        $this->messages[] = $sentMessage;
        //dispacting the evnent
        broadcast(new MessageSentEvent($sentMessage));

        $this->message = null;

        $this->dispatch('message-updated');

    }

    #[On('echo-private:channel-chat.{sender_id},MessageSentEvent')]
    public function listenMessage($event)
    {

        // yaha event mai array that lekn message ka fromat eloquent that tu hm ne change kia cnvert message to elequont
        $newMessage = Message::find($event['message']['id'])->load('sender:id,name', 'receiver:id,name');
        $this->messages[] = $newMessage;
        // dd($event);
    }

    public function saveMessage()
    {
        return Message::create([
            'sender_id'   => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'message'     => $this->message,
            // 'filename' => null,
            // 'file_original_name' => null,
            // 'folder_path' => null,
            'is_read'     => false,

        ]);

    }
    public function getMessages()
    {
        return Message::with('sender:id,name', 'receiver:id,name')->where(function ($query) {
            $query->where('sender_id', $this->sender_id)
                ->where('receiver_id', $this->receiver_id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver_id)
                ->where('receiver_id', $this->sender_id);
        })->orderBy('created_at', 'asc')->get();

    }
}
