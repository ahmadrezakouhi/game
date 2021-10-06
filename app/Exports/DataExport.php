<?php

namespace App\Exports;

use App\User;
use App\Answer;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use phpDocumentor\Reflection\Types\Null_;

class DataExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $users = User::where('user_type', 'user')->get();
        $a = array();
        $i = 0;

        foreach ($users as $user) {
            $a[$i][] = $user->email;
            $a[$i][] = $user->enter;
            $a[$i][] = $user->exit;
            $a[$i][] = $user->resolution;
            $a[$i][] = $user->letter;
            $a[$i][] = $user->letter_time;

            foreach ($user->answers as $answer) {
                $a[$i][] = $answer->time;
                $a[$i][] = $answer->result;
            }
            if (count($user->answers) < 8) {

                for ($j = 1; $j <= (8 - count($user->answers)) * 2; $j++) {
                    $a[$i][] = NULL;
                }
            }
            foreach ($user->ranks as $rank) {
                $a[$i][] = $rank->first_person_time;
                $a[$i][] = $rank->new_first_person_time;
                $a[$i][] = $rank->first_person;
                $a[$i][] = $rank->new_first_person;
                $a[$i][] = ""; // should work
                $a[$i][] = $rank->last_person_time;
                $a[$i][] = $rank->new_last_person_time;
                $a[$i][] = $rank->last_person;
                $a[$i][] = $rank->new_last_person;
                $a[$i][] = ""; //should work

            }


            if (count($user->ranks) < 8) {

                for ($j = 1; $j <= (8 - count($user->ranks)) * 10; $j++) {
                    $a[$i][] = NULL;
                }
            }
            $persons = ["H", "M", "O", "G"];
            if ($user->letter) {
                if (($key = array_search($user->letter, $persons)) !== false) {
                    array_splice($persons, $key, 1);
                }
                for ($j = 0; $j < 3; $j++) {
                    $a[$i][] = $persons[$j];
                }
            } else {
                for ($j = 0; $j < 3; $j++) {
                    $a[$i][] = NULL;
                }
            }


            $a[$i][] = "Q(best rank rt)";
            $a[$i][] = "Q if changed BR(rt)";
            $a[$i][] = "Q(BR ans)";
            $a[$i][] = "Q if changed BR(ans)";
            $a[$i][] = "Q(BR correct ans)";
            switch ($user->condition) {
                case 0:
                    $a[$i][] = "pro1";
                    break;

                case 1:
                    $a[$i][] = "pro8";
                    break;
                case 2:
                    $a[$i][] = "anti8";

                    break;
                case 3:
                    $a[$i][] = "anti1";
                    break;
            }

            $a[$i][] = "Q(best estimation rt)";
            $a[$i][] = "if changed Q BE(rt)";
            $a[$i][] = "Q(BE ans)";
            $a[$i][] = "If changed Q BE(ans)";
            $a[$i][] = "Q(BE correct ans)";
            $a[$i][] = "rate(knowledge)";
            $a[$i][] = "rate k(rt)";
            $a[$i][] = "rate (competitor)";
            $a[$i][] = "rate c(rt)";
            foreach ($user->money as $m) {
                $a[$i][] = $m->result;
                $a[$i][] = $m->time;
            }

            if (count($user->money) < 10) {
                for ($j = 1; $j <= (10 - count($user->money)) * 8; $j++) {
                    $a[$i][] = NULL;
                }
            }


            $i++;
        }
        return collect($a);
    }
    public function headings(): array
    {
        $header = [
            "email",
            "enter(t)",
            "exit(t)",
            "resulotion",
            "choosed(letter)",
            "letter(rt)"
        ];
        for ($i = 1; $i <= 8; $i++) {
            $header[] = "Q" . $i . "(rt)";
            $header[] = "Q" . $i . "(ans)";
        }

        for ($i = 1; $i <= 8; $i++) {
            $header[] = $i . "who'se first(rt)";
            $header[] = $i . "f(if changed rt)";
            $header[] = $i . "who'se first(letter)";
            $header[] = $i . "f(if changed letter)";
            $header[] = $i . "who'se first(correct ans)";
            $header[] = $i . "who'se last(rt)";
            $header[] = $i . "l(if changed rt)";
            $header[] = $i . "who'se last(letter)";
            $header[] = $i . "l(if changed letter)";
            $header[] = $i . "who'se last(correct ans)";
        }
        $header[] = "final rank(1 one)";
        $header[] = "final rank(2 one)";
        $header[] = "final rank(3 one)";
        $header[] = "Q(best rank rt)";
        $header[] = "Q if changed BR(rt)";
        $header[] = "Q(BR ans)";
        $header[] = "Q if changed BR(ans)";
        $header[] = "Q(BR correct ans)";
        $header[] = "condition";
        // for ($i = 1; $i <= 10; $i++) {
        //     $header[] = $i . "verbal(rt)";
        //     $header[] = "If changed " . $i . "v(rt)";
        //     $header[] = $i . "v($)";
        //     $header[] = "If changed " . $i . "v($)";
        //     $header[] = $i . "practical(rt)";
        //     $header[] = "If changed " . $i . "p(rt)";
        //     $header[] = $i . "p($)";
        //     $header[] = "If changed " . $i . "p($)";
        // }
        $header[] = "Q(best estimation rt)";
        $header[] = "if changed Q BE(rt)";
        $header[] = "Q(BE ans)";
        $header[] = "If changed Q BE(ans)";
        $header[] = "Q(BE correct ans)";
        $header[] = "rate(knowledge)";
        $header[] = "rate k(rt)";
        $header[] = "rate (competitor)";
        $header[] = "rate c(rt)";



        return $header;
    }
}
