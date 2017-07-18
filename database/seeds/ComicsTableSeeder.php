<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comics')->insert([
            'comic_title' 		=> 'Spider-Man',
            'comic_image'		=> 'image.jpg',
            'comic_description' => "Spider-Man is a fictional superhero appearing in American comic books published by Marvel Comics. The character was created by writer-editor Stan Lee and writer-artist Steve Ditko, and first appeared in the anthology comic book Amazing Fantasy #15 (Aug. 1962) in the Silver Age of Comic Books. Lee and Ditko conceived the character as an orphan being raised by his Aunt May and Uncle Ben in New York City, and as a teenager, having to deal with the normal struggles of adolescence in addition to those of a costumed crime-fighter. Spider-Man's creators gave him super strength and agility, the ability to cling to most surfaces, shoot spider-webs using wrist-mounted devices of his own invention, which he calls 'web-shooters', and react to danger quickly with his 'spider-sense', enabling him to combat his foes.

				When Spider-Man first appeared in the early 1960s, teenagers in superhero comic books were usually relegated to the role of sidekick to the protagonist. The Spider-Man series broke ground by featuring Peter Parker, the high school student behind Spider-Man's secret identity and with whose 'self-obsessions with rejection, inadequacy, and loneliness' young readers could relate.[8] While Spider-Man had all the makings of a sidekick, unlike previous teen heroes such as Bucky and Robin, Spider-Man had no superhero mentor like Captain America and Batman; he thus had to learn for himself that 'with great power there must also come great responsibility'—a line included in a text box in the final panel of the first Spider-Man story but later retroactively attributed to his guardian, the late Uncle Ben.

				Marvel has featured Spider-Man in several comic book series, the first and longest-lasting of which is titled The Amazing Spider-Man. Over the years, the Peter Parker character has developed from shy, nerdy New York City high school student to troubled but outgoing college student, to married high school teacher to, in the late 2000s, a single freelance photographer. In the 2010s, he joins the Avengers, Marvel's flagship superhero team. Spider-Man's nemesis Doctor Octopus also took on the identity for a story arc spanning 2012–2014, following a body swap plot in which Peter appears to die.[9] Separately, Marvel has also published books featuring alternate versions of Spider-Man, including Spider-Man 2099, which features the adventures of Miguel O'Hara, the Spider-Man of the future; Ultimate Spider-Man, which features the adventures of a teenaged Peter Parker in an alternate universe; and Ultimate Comics Spider-Man, which depicts the teenager Miles Morales, who takes up the mantle of Spider-Man after Ultimate Peter Parker's supposed death. Miles is later brought into mainstream continuity, where he works alongside Peter.",
            'comic_author'		=> 'Marvel',
            'comic_genre'		=> 'Superhero',
            'comic_release'		=> '2005',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
