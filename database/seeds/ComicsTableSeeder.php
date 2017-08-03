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

				When Spider-Man first appeared in the early 1960s, teenagers in superhero comic books were usually relegated to the role of sidekick to the protagonist. The Spider-Man series broke ground by featuring Peter Parker, the high school student behind Spider-Man's secret identity and with whose 'self-obsessions with rejection, inadequacy, and loneliness' young readers could relate.[8] While Spider-Man had all the makings of a sidekick, unlike previous teen heroes such as Bucky and Robin, Spider-Man had no superhero mentor like Captain America and Batman; he thus had to learn for himself that 'with great power there must also come great responsibility'—a line included in a text box in the final panel of the first Spider-Man story but later retroactively attributed to his guardian, the late Uncle Ben.",
            'comic_author'		=> 'Marvel',
            'comic_genre'		=> 'Superhero',
            'comic_release'		=> '2005',
            'comic_status'      => 'Ongoing',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Bleach',
            'comic_image'       => 'bleach.png',
            'comic_description' => "Ichigo Kurosaki never asked for the ability to see ghosts -- he was born with the gift. When his family is attacked by a Hollow -- a malevolent lost soul -- Ichigo becomes a Soul Reaper, dedicating his life to protecting the innocent and helping the tortured spirits themselves find peace.",
            'comic_author'      => 'Tite-Kubo',
            'comic_genre'       => 'Adventure, Action, School',
            'comic_release'     => '2004',
            'comic_status'      => 'Ongoing',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'One-Piece',
            'comic_image'       => 'one_piece_1.jpeg',
            'comic_description' => "One Piece is a Japanese manga series written and illustrated by Eiichiro Oda. It has been serialized in Shueisha's Weekly Shōnen Jump magazine since July 19, 1997, with the chapters collected into 85 tankōbon volumes to date.",
            'comic_author'      => 'Eichiro-Oda',
            'comic_genre'       => 'Adventure, Action, Comedy',
            'comic_release'     => '1997',
            'comic_status'      => 'Ongoing',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'One-Punch-Man',
            'comic_image'       => 'opm-1.jpg',
            'comic_description' => "On an unnamed Earth-like super-continent planet, strange monsters and supervillains have been mysteriously appearing and causing disasters. To combat them, the world's superheroes have risen to fight them. Saitama is one such superhero, hailing from the metropolis of Z-City and easily defeating monsters and villains with a single punch. However, he has become bored with his power and only gets truly excited when fighting strong opponents that can challenge him. Over the course of the series, Saitama encounters various superheroes, supervillains, and monsters. He gains a disciple in the form of the cyborg Genos and eventually joins the Hero Association in order to gain official recognition.",
            'comic_author'      => 'Yusuke-Murata',
            'comic_genre'       => 'Action, Superhero',
            'comic_release'     => '2009',
            'comic_status'      => 'Ongoing',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Sword-Art-Online',
            'comic_image'       => 'sao.jpg',
            'comic_description' => "In 2022, a Virtual Reality Massively Multiplayer Online Role-Playing Game (VRMMORPG) called Sword Art Online (SAO) is released. With the NerveGear, a helmet that stimulates the user's five senses via their brain, players can experience and control their in-game characters with their minds. Both the game and the NerveGear was created by Akihiko Kayaba. On November 6, 10,000 players log into the SAO's mainframe cyberspace for the first time, only to discover that they are unable to log out. Kayaba appears and tells the players that they must beat all 100 floors of Aincrad, a steel castle which is the setting of SAO, if they wish to be free. Those who suffer in-game deaths or forcibly remove the NerveGear out-of-game will suffer real-life deaths. One of the players named Kazuto 'Kirito' Kirigaya is one of 1,000 testers in the game's previous closed beta. With the advantage of previous VR gaming experience and a drive to protect other beta testers from discrimination, he isolates himself from the greater group and plays the game alone, bearing the mantle of 'beater', a 'beta tester' and 'cheater'. As the players progress through the game Kirito eventually befriends a young girl named Asuna Yūki, forming a relationship with and later marrying her in-game. After the duo discover the identity of Kayaba's secret ID, who was playing as the leader of the guild Asuna joined in, they confront and destroy him, freeing themselves and the other players from the game.",
            'comic_author'      => 'Reki-Kawahara',
            'comic_genre'       => 'Adventure, Action, Other World, Game',
            'comic_release'     => '2012',
            'comic_status'      => 'Ongoing',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Mobile-Suit-Gundam-00',
            'comic_image'       => 'gundam00-1.jpg',
            'comic_description' => "The series is set in 2307 AD. As a result of the depletion of fossil fuels, humanity had to search for a new source of power. The power was found in the form of multiple Dyson rings (massive arrays of solar power collectors) orbiting Earth, and supported by three orbital elevators, each one serving one of the three 'power blocs' on the planet, namely Union, controlling the region surrounding North America; Human Reform League (Sino-Japanese: 人類革新連盟; Romaji: jinrui kakushin renmei; Pinyin: rénlèi géxīn liánméng), consisting of China, Russia and India; and AEU, which controls mainland Europe. With this nearly inexhaustible source of energy benefiting only the major powers and their allies, constant warfare erupts around the globe among minor countries for fuels and energy. Countries that once economically relied on the sale of fossil fuels have plunged into poverty. Some even believe that solar energy threatened the 'promised land of God', resulting in the 20-year Solar Wars. This chaos led to the formation of a private military organization, called Celestial Being (ソレスタルビーイング Soresutaru Bīingu), dedicated to eradicating war and uniting humanity through the use of four advanced machines called Gundams.[1][3] Mobile Suit Gundam 00 follows four mobile suit pilots termed Gundam Meisters (ガンダムマイスター Gandamu Maisutā), sided with Celestial Being. The main protagonist is 16-year-old Setsuna F. Seiei, a taciturn Gundam pilot who grew up in the war-torn Republic of Krugis",
            'comic_author'      => 'Yōsuke-Kuroda',
            'comic_genre'       => 'Action, War, Robot',
            'comic_release'     => '2009',
            'comic_status'      => 'Completed',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Naruto',
            'comic_image'       => 'naruto.jpg',
            'comic_description' => "A powerful fox known as the Nine-Tails attacks Konoha, the hidden leaf village in the Land of Fire, one of the Five Great Shinobi Countries in the Ninja World. In response, the leader of Konoha, the Fourth Hokage, seals the fox inside the body of his newborn son, Naruto Uzumaki, making Naruto a host of the beast. This costs Naruto's father his life, and the Third Hokage returns from retirement to become leader of Konoha again. As a child, Naruto is shunned by the Konoha community, who regard Naruto as if he were the Nine-Tails. Because of a decree made by the Third Hokage forbidding anyone to mention these events, Naruto knows nothing about the Nine-Tails until twelve years later, when Mizuki, a renegade ninja, reveals the truth to Naruto. Naruto then defeats Mizuki in combat, earning the respect of his teacher Iruka Umino.[e] Shortly afterwards, Naruto becomes a ninja and joins with Sasuke Uchiha, whom he often competes against, and Sakura Haruno, whom he has a crush on, to form Team 7, under an experienced sensei, the elite ninja Kakashi Hatake. Like all the ninja teams from every village, Team 7 completes missions requested by the villagers, ranging from doing chores and being bodyguards to performing assassinations.",
            'comic_author'      => 'Masashi-Kishimoto',
            'comic_genre'       => 'Adventure, Action, Comedy, Ninja, War',
            'comic_release'     => '2002',
            'comic_status'      => 'Completed',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Ruroni-Kenshin',
            'comic_image'       => 'samuraix.jpg',
            'comic_description' => "In the early Meiji era, after participating in the Bakumatsu war as the assassin 'Hitokiri Battōsai', Himura Kenshin wanders the countryside of Japan offering protection and aid to those in need as atonement for the murders he once committed. When arriving in Tokyo in the 11th year of Meiji (1878), he meets a young woman named Kamiya Kaoru, who is in the middle of a fight with a murderer - who claims to be the Hitokiri Battōsai - tarnishing the name of the swordsmanship school that she teaches. Kenshin decides to help her and defeats the fake Battōsai. After discovering that Kenshin is the real infamous assassin, Kaoru offers him a place to stay at her dojo noting that he is peace-loving and not cold-hearted, as his reputation implies. Kenshin accepts and begins to establish lifelong relationships with many people such as Sagara Sanosuke, a former Sekihō Army member; Myōjin Yahiko, an orphan from a samurai family who is also living with Kaoru as her student; and a doctor named Takani Megumi, caught in the opium trade. However, he also deals with his fair share of enemies, new and old, including the former leader of the Oniwabanshū, Shinomori Aoshi and a rival from the Bakumatsu turned police officer, Saitō Hajime. After several months of living in the dojo, Kenshin discovers that his successor as assassin of the shadows, Shishio Makoto, plans to conquer Japan by destroying the Meiji Government, starting with Kyoto. Feeling that his friends may be attacked by Shishio's faction, Kenshin goes to meet Shishio alone in order to defeat him. However, many of his friends, including a young Oniwabanshū named Makimachi Misao, whom he meets in his travels, decide to help him in his fight. After his first meeting with him, Kenshin realizes he needs to get stronger to defeat Shishio without becoming the cold assassin he was in the past and returns to the man who taught him kenjutsu, Hiko Seijūrō, in order to learn the school's final technique. He finally accepts his friends' help and defeats Shishio in a close fight; Shishio dies being engulfed in flames due to the rise in his body temperature caused by his severe burns.",
            'comic_author'      => 'Nobuhiro-Watsuki',
            'comic_genre'       => 'Action, Samurai, War',
            'comic_release'     => '2012',
            'comic_status'      => 'Completed',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Inuyasha',
            'comic_image'       => 'Inuyasha.jpg',
            'comic_description' => "In modern-day Tokyo, Kagome Higurashi lives on the grounds of her family's Shinto shrine with her mother, grandfather and little brother. On her fifteenth birthday, when she goes to retrieve her cat, a centipede demon bursts out of the enshrined Bone Eater's Well (骨喰いの井戸 Honekui no Ido) and drags Kagome into it. But instead of hitting the bottom of the well, Kagome time travels to the past during Japan's Sengoku period. The centipede demon seeks the Shikon Jewel (四魂の玉 Shikon no Tama, lit. 'The Jewel of Four Souls'), an artifact that would grant any wish the bearer desires; it had previously been defeated by a warrior priestess named Kikyo, and Kagome looks just like her. In fact, Kagome is a reincarnation of Kikyo and houses the Shikon Jewel in her own body. Kagome finds a young man pinned by a sacred arrow on a tree and, in a moment of desperation, frees him to defeat the centipede demon. The man is Inuyasha, a half-dog demon (yōkai) who was pinned by Kikyo for trying to steal the jewel. However, the Shikon Jewel is extracted from Kagome's body, and in the ensuing fight with another crow demon, the jewel is shattered into numerous shards that disperse across ancient Japan, falling into the hands of those who then gain the individual shards' power.",
            'comic_author'      => 'Rumiko-Takahashi',
            'comic_genre'       => 'Adventure, Action, Other World, Samurai, War',
            'comic_release'     => '1996',
            'comic_status'      => 'Completed',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Dragon-Ball',
            'comic_image'       => 'dragon ball.jpg',
            'comic_description' => "The series begins with a monkey-tailed boy named Goku befriending a teenage girl named Bulma, whom he accompanies to find the seven Dragon Balls (ドラゴンボール Doragon Bōru), which summon the dragon Shenlong to grant the user one wish. The journey leads them to the desert bandit Yamcha, who later becomes an ally; Chi-Chi, whom Goku unknowingly agrees to marry; and Pilaf, an impish man who seeks the Dragon Balls to fulfill his desire to rule the world. Goku then undergoes rigorous training regimes under the martial arts master Kame-Sen'nin in order to fight in the Tenkaichi Budōkai (天下一武道会, 'Strongest Under the Heavens Martial Arts Tournament'). A monk named Kuririn becomes his training partner and rival, but they soon become best friends. After the tournament, Goku searches for the Dragon Ball his grandfather left him and almost single-handedly defeats the Red Ribbon Army and their hired assassin Taopaipai. Thereafter Goku reunites with his friends to defeat the fortuneteller Baba Uranai's fighters and have her locate the last Dragon Ball to revive a friend killed by Taopaipai.",
            'comic_author'      => 'Akira-Toriyama',
            'comic_genre'       => 'Adventure, Action, Other World, War',
            'comic_release'     => '1984',
            'comic_status'      => 'Completed',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Gangsta',
            'comic_image'       => 'gangsta.jpg',
            'comic_description' => "The series revolves around two 'Handymen' who take on jobs for both the mob and the police force that no one else can handle. The two, named Worick Arcangelo and Nicolas Brown, work in the town of Ergastulum, which is full of mafia, hoodlums and dirty cops.",
            'comic_author'      => 'Kohske',
            'comic_genre'       => 'Action, Crime, Police, War',
            'comic_release'     => '2011',
            'comic_status'      => 'Completed',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Hunter-X-Hunter',
            'comic_image'       => 'hunterxhunter.jpg',
            'comic_description' => "Hunters (ハンター Hantā) are licensed, elite members of humanity who are capable of tracking down secret treasures, rare beasts, or even other individuals. To obtain a license one must pass the rigorous annual Hunter Examination run by the Hunter Association, which has a success rate of less than one in a hundred-thousand. A Hunter may be awarded up to three stars; a single star for making 'remarkable achievements in a particular field'; they may then be upgraded to two stars for 'holding an official position' and mentoring another Hunter up to single star level; and finally upgraded to three stars for 'remarkable achievements in multiple fields.'",
            'comic_author'      => 'Yoshihiro-Togashi',
            'comic_genre'       => 'Adventure, Action, War',
            'comic_release'     => '1998',
            'comic_status'      => 'Ongoing',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comics')->insert([
            'comic_title'       => 'Fullmetal-Alchemist',
            'comic_image'       => 'fma.jpg',
            'comic_description' => "Fullmetal Alchemist takes place in an alternate history, in the fictional country of Amestris (アメストリス Amesutorisu). In the world, alchemy is one of the most-practiced sciences; Alchemists who work for the government are known as State Alchemists (国家錬金術師Kokka Renkinjutsushi) and are automatically given the rank of Major in the military. Alchemists have the ability, with the help of patterns called Transmutation Circles, to create almost anything they desire. However, when they do so, they must provide something of equal value in accordance with the Law of Equivalent Exchange. The only things Alchemists are forbidden from transmuting are humans and gold. There has never been a successful human transmutation; those who attempt it lose a part of their body and the result is a horrific inhuman mass. Attemptees are confronted by Truth (真理 Shinri), a pantheistic and semi-cerebral God-like being who tauntingly regulates all alchemy use and whose nigh-featureless appearance is relative to whom Truth is conversing with; the series' antagonist, Father, and some other characters, claim and believe that Truth is a personal God who punishes the arrogant, a belief that Edward denies, citing a flaw in Father's interpretation of Truth's works.",
            'comic_author'      => 'Hiromu-Arakawa',
            'comic_genre'       => 'Action,Adventure',
            'comic_release'     => '2001',
            'comic_status'      => 'Completed',
            'last_chapter'      => '',
            'last_chapter_title'=> '',
            'dates'         => new DateTime,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
