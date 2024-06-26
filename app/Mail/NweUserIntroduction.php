<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NweUserIntroduction extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $subject = '新しいユーザが追加されました';
    public User $toUser;
    public User $newUser;
    /**
     * Create a new message instance.
     */
    public function __construct(User $toUser,User $newUser)
    {
        //
        $this->toUser = $toUser;
        $this->newUser = $newUser;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nwe User Introduction',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view: 'view.name',
            // view: 'email.new_user_introduction',
            markdown: 'email.new_user_introduction',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
