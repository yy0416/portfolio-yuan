<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(
    name: 'app:test-email',
    description: 'Send a test email to verify mailer configuration',
)]
class TestEmailCommand extends Command
{
    public function __construct(
        private MailerInterface $mailer
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->note('Attempting to send test email...');

        try {
            $email = (new Email())
                ->from('yueyuan0416@gmail.com')  // 你的Gmail
                ->to('wheathare@gmail.com')    // 接收邮件的地址
                ->subject('Test Email from Portfolio')
                ->html('<p>This is a test email from your portfolio website.</p>');

            $this->mailer->send($email);

            $io->success([
                'Test email sent successfully!',
                'Check your inbox (and spam folder).'
            ]);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error([
                'Failed to send test email',
                'Error: ' . $e->getMessage()
            ]);

            return Command::FAILURE;
        }
    }
}
