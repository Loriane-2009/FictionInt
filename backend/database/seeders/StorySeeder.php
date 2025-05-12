<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Choice;
use App\Models\Story;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $story = Story::create([
            'title' => 'Le Temple Oublié',
            'description' => 'Une aventure riche en pièges, énigmes et décisions périlleuses dans un ancien temple perdu.',
        ]);

        // CHAPITRES

        $c1 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Devant le temple',
            'content' => 'Tu arrives devant un temple enfoui sous la végétation. Deux entrées : la grande porte ou un passage étroit à moitié effondré.',
        ]);

        $c2 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Entrée principale',
            'content' => 'La porte grince… tu entres dans une salle immense. Le sol semble instable et des dalles s’enfoncent sous ton poids.',
        ]);

        $c3 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Passage étroit',
            'content' => 'Tu rampes sous les rochers. C\'est sombre, tu entends un bruit d’eau qui coule quelque part…',
        ]);

        $c4 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Salle d’énigme',
            'content' => 'Tu arrives dans une salle éclairée par une lueur étrange. Sur le mur : "Je ne suis vivant que lorsque je suis consommé. Qui suis-je ?" Deux statues t’attendent.',
        ]);

        $c5 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Galerie secrète',
            'content' => 'Un passage secret s’ouvre sur ta gauche. Tu longes un tunnel couvert de fresques anciennes.',
        ]);

        $c6 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Puits maudit',
            'content' => 'Tu glisses sur une pierre humide et tombes dans un puits sans fond. Tu n’auras pas de seconde chance.',
        ]);

        $c7 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Salle au trésor',
            'content' => 'Une porte s’ouvre. Le sol est recouvert d’or, de pierres précieuses et d’objets anciens. Tu as trouvé le cœur du temple !',
        ]);

        $c8 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Effondrement',
            'content' => 'La salle tremble. Le plafond s’effondre sur toi. C’est la fin.',
        ]);

        $c9 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Sortie secondaire',
            'content' => 'Tu trouves une issue dérobée donnant sur la jungle. Tu pars avec quelques artefacts, sain et sauf.',
        ]);

        $c10 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Sanctuaire caché',
            'content' => 'Tu découvres une pièce circulaire, calme, avec une statue au centre qui tient un objet lumineux. Une dernière décision t’attend.',
        ]);

        // choices

        // Chapter 1
        Choice::create(['chapter_id' => $c1->id, 'choice_text' => 'Entrer par la grande porte', 'next_chapter_id' => $c2->id]);
        Choice::create(['chapter_id' => $c1->id, 'choice_text' => 'Passer par le tunnel étroit', 'next_chapter_id' => $c3->id]);

        // Chapter 2
        Choice::create(['chapter_id' => $c2->id, 'choice_text' => 'Suivre les dalles intactes', 'next_chapter_id' => $c4->id]);
        Choice::create(['chapter_id' => $c2->id, 'choice_text' => 'Forcer le mur à gauche', 'next_chapter_id' => $c5->id]);

        // Chapter 3
        Choice::create(['chapter_id' => $c3->id, 'choice_text' => 'Suivre le bruit de l’eau', 'next_chapter_id' => $c10->id]);
        Choice::create(['chapter_id' => $c3->id, 'choice_text' => 'Escalader les pierres', 'next_chapter_id' => $c6->id]);

        // Chapter 4
        Choice::create(['chapter_id' => $c4->id, 'choice_text' => 'Choisir la statue "le feu"', 'next_chapter_id' => $c7->id]);
        Choice::create(['chapter_id' => $c4->id, 'choice_text' => 'Choisir la statue "le souffle"', 'next_chapter_id' => $c8->id]);

        // Chapter 5
        Choice::create(['chapter_id' => $c5->id, 'choice_text' => 'Continuer dans la galerie', 'next_chapter_id' => $c9->id]);

        // Chapter 10
        Choice::create(['chapter_id' => $c10->id, 'choice_text' => 'Prendre l’objet', 'next_chapter_id' => $c7->id]);
        Choice::create(['chapter_id' => $c10->id, 'choice_text' => 'Ignorer et repartir', 'next_chapter_id' => $c8->id]);

        // ---------------------------

        $story = Story::create([
            'title' => 'La Tour Abandonnée',
            'description' => 'Une tour solitaire au sommet d\'une colline... mais que cache-t-elle ?',
        ]);

        $chapter1 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Entrée dans la tour',
            'content' => 'Deux escaliers : l\'un monte vers le sommet, l\'autre descend sous la terre.',
        ]);

        $chapter2 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Le sommet venteux',
            'content' => 'Arrivé en haut, la tour tremble sous le vent violent.',
        ]);

        $chapter3 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'La chambre mystérieuse',
            'content' => 'Une pièce sombre pleine d\'artefacts anciens.',
        ]);

        $chapter4 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Le trésor caché',
            'content' => 'Un coffre rempli d\'or t\'attend au fond de la chambre.',
        ]);

        $chapter5 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'L\'effondrement',
            'content' => 'La tour s\'effondre sous tes pieds. Tu n\'y survivras pas.',
        ]);

        // Choices
        Choice::create([
            'chapter_id' => $chapter1->id,
            'choice_text' => 'Monter vers le sommet',
            'next_chapter_id' => $chapter2->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter1->id,
            'choice_text' => 'Descendre dans les sous-sols',
            'next_chapter_id' => $chapter3->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter2->id,
            'choice_text' => 'Explorer le sommet',
            'next_chapter_id' => $chapter5->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter2->id,
            'choice_text' => 'Redescendre',
            'next_chapter_id' => $chapter3->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter3->id,
            'choice_text' => 'Ouvrir un coffre ancien',
            'next_chapter_id' => $chapter4->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter3->id,
            'choice_text' => 'Ignorer les artefacts',
            'next_chapter_id' => $chapter5->id,
        ]);

        $story = Story::create([
            'title' => 'L\'Oasis Maudite',
            'description' => 'Dans le désert, une oasis te tente... mais est-ce réel ?',
        ]);

        $chapter1 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Découverte de l\'oasis',
            'content' => 'Une oasis apparaît au loin, mirage ou réalité ?',
        ]);

        $chapter2 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'Le mirage trompeur',
            'content' => 'Le mirage t\'attire dans le désert infini.',
        ]);

        $chapter3 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'La source cachée',
            'content' => 'Tu trouves une véritable source d\'eau.',
        ]);

        $chapter4 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'La cité antique',
            'content' => 'La vraie cité apparaît et tu y es accueilli en héros.',
        ]);

        $chapter5 = Chapter::create([
            'story_id' => $story->id,
            'title' => 'La soif mortelle',
            'content' => 'La chaleur écrasante t\'emporte. Fin tragique.',
        ]);

        // Choices
        Choice::create([
            'chapter_id' => $chapter1->id,
            'choice_text' => 'S\'approcher de l\'oasis',
            'next_chapter_id' => $chapter2->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter1->id,
            'choice_text' => 'Ignorer et continuer',
            'next_chapter_id' => $chapter3->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter2->id,
            'choice_text' => 'Suivre le mirage',
            'next_chapter_id' => $chapter5->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter3->id,
            'choice_text' => 'Boire à la source',
            'next_chapter_id' => $chapter4->id,
        ]);

        Choice::create([
            'chapter_id' => $chapter3->id,
            'choice_text' => 'Continuer à pied sans boire',
            'next_chapter_id' => $chapter5->id,
        ]);
    }
}
