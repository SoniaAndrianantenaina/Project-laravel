<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use App\Mail\Anniversaire;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class SendBirthdayGreetings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-greetings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday greetings to employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        /*$today = now()->format('d-m');

        $employees = DB::select('SELECT e.idEmploye, c.nom, c.prenom, c.datenaissance, c.email from employes e join candidats c on c.idCandidat = e.idCandidat');

        foreach ($employees as $employee) {
            $dob = $employee->datenaissance->format('d-m');
            $email = $employee->email;
            if ($dob === $today) {
                Mail::to($email)->send(new Anniversaire());
            }
        }*/

        $email = 'andrianantenainasonia@gmail.com';
        $attachmentPath = public_path('assets/images/anniv/anniversaire.jpg');

        Mail::to($email)
            ->send(new Anniversaire($attachmentPath));
    }
}
