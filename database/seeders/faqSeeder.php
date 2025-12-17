<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class faqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sections
        $sections = [
            ['name' => 'Studiekeuze', 'order' => 1],
            ['name' => 'Studiefinanciering', 'order' => 2],
            ['name' => 'Welzijn', 'order' => 3],
        ];

        DB::table('sections')->insert($sections);

        // Retrieve section IDs
        $studiekeuzeId = DB::table('sections')->where('name', 'Studiekeuze')->value('id');
        $studiefinancieringId = DB::table('sections')->where('name', 'Studiefinanciering')->value('id');
        $welzijnId = DB::table('sections')->where('name', 'Welzijn')->value('id');

        // Insert FAQs
        DB::table('faqs')->insert([
            [
                'section_id' => $studiekeuzeId,
                'order' => 1,
                'question' => 'Ik twijfel of ik wel op de juiste studie zit, kan ik nog switchen?',
                'answer' => 'Dat hangt af van een paar dingen. Sommige opleidingen hebben flexibele instroom maar de meesten beginnen in (februari en) september. Als je 18 bent is het ook mogelijk om te stoppen met school en te werken tot het nieuwe schooljaar. Maar dan betaal je wel schoolgeld voor het hele jaar. *Meer weten? Ga naar de chatfunctie voor meer info of om een afspraak te maken.'
            ],
            [
                'section_id' => $studiekeuzeId,
                'order' => 2,
                'question' => 'Wat is expeditie alfa?',
                'answer' => 'Dat is een persoonlijk oriëntatietraject van 15 weken voor studenten die vastlopen in hun opleiding omdat deze toch niet passend is of omdat ze een oriëntatievraag hebben. Zie link voor meer info.'
            ],
            [
                'section_id' => $studiefinancieringId,
                'order' => 3,
                'question' => 'Wanneer is DUO weer op school?',
                'answer' => 'Elke laatste donderdag van de maand van 13-15 uur zit er een medewerker van DUO links in de kantine, die kan al je vragen beantwoorden.'
            ],
            [
                'section_id' => $studiefinancieringId,
                'order' => 4,
                'question' => 'Aanvullende beurs, DUO stelt vragen over mijn ouders, wat moet ik nu?',
                'answer' => 'Soms is het voor DUO onduidelijk wie je ouders zijn en wat hun inkomsten zijn. Ze vragen dan om extra info. Soms wil je een ouder “buiten beschouwing laten” voor de berekening van je aanvullende beurs. Het LBC kan je helpen met een deskundigenverklaring. *Meer weten? Ga naar de chatfunctie voor meer info of om een afspraak te maken.'
            ],
            [
                'section_id' => $welzijnId,
                'order' => 5,
                'question' => 'Ik voel me niet fijn, zit slecht in mijn vel. Kan ik op school hulp hiervoor krijgen?',
                'answer' => 'Zeker, er zijn meerdere mogelijkheden. We hebben een schoolpastor die met je in gesprek kan, we werken samen met School als Wijk en bij het team LBC zitten ook veel betrokken mensen.'
            ],
            [
                'section_id' => $welzijnId,
                'order' => 6,
                'question' => 'Ik heb last van faalangst, kan ik daar hulp bij krijgen?',
                'answer' => 'Ja zeker, je kan op deze link klikken voor een app die gemaakt is door andere studenten waar wat tips en info op staan. Ook hebben we trainers in huis voor een paar gesprekken om je hiermee te helpen. * Meer weten? Ga naar de chatfuncite voor meer info of om een afspraak te maken.'
            ],
        ]);
    }
}
