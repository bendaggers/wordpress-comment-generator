<?php
// comment-author.php

function generate_comment_author_name() {

    $option_probabilities = array(
        'first_last' => 0.60,          // 60%
        'first_middle_last' => 0.15,   // 15%
        'first' => 0.25               // 25%
    );

    $selected_option = weighted_random($option_probabilities);
    global $selected_option;

    $first_names = array("Juan","Pedro","Antonio","Jose","Santos","Carlos","Emilio","Ricardo","Francisco","Manuel","Andres","Luis","Alberto","Fernando","Marcelo","Roberto","Miguel","Eduardo","Alejandro","Ramon","Felipe","Benjamin","Gabriel","Rafael","Leonardo","Rodrigo","Julio","Cesar","Enrique","Vicente","Arturo","Martin","Angel","Gilberto","Dominador","Leopoldo","Bernardo","Gervasio","Rolando","Teodoro","Quirino","Arnold","Gerald","Renato","Warlito","Claudio","Isidro","Domingo","Bernardino","Clemente","Roderick","Mariano","Noel","Eliseo","Eustaquio","Eusebio","Simeon","Hipolito","Orlando","Cornelio","Ernesto","Nestor","Teodorico","Ismael","Cipriano","Norberto","Joselito","Lorenzo","Artemio","Wilfredo","Alfonso","Virgilio","Paterno","Lucio","Zosimo","Gener","Abelardo","Lamberto","Porfirio","Valentino","Porfirio","Gaudencio","Raymundo","Edgardo","Carmelo","Nicanor","Justo","Jeremias","Mariano","Anacleto","Antonino","Efren","Rodolfo","Anton","Dionisio","Reynaldo","Basilio","Marcos","Eduardo","Jerome","Osias","Bong","Jun","Migs","Dong","Alex","Jojo","Kiko","Renz","Jong","Raffy","Rico","Jomar","Chito","EJ","Jay-R","Dindo","Ron-Ron","Coco","Macky","Alden","Nash","Xander","Kian","Daniel","Vic","Marky","Janno","Piolo","James","Gerald","John Lloyd","Sam","Derek","Enrique","Paulo","Zanjoe","Aga","Cesar","Diether","Dingdong","Goma","Ian","Matteo","Rayver","Sam Milby","Sid","Tom","Vhong","Yael","Yves","Baron","Coco Martin","Dominic","Edu","Francis","Gary","Hayden","Ivan","Jake","Jericho","Joseph","Keanu","Luis","Marc","Nino","Oyo","Paolo","Quincy","Ricky","Sunshine","Tony","Ulysses","Val","Wency","Xian","Yul","Zoren","Aljur","Bret","Christian","Ding","Edgar","Froilan","George","Hiro","Ignacio","Jason","Kim","Louie","Michael","Nikko","Ogie","Patrick","Queenie","Ryan","Santino","Tonton","Usher","Vince","Wowie","Xander","Yuri","Zack","Mingming","Lala","Inday","Nene","Lenlen","Tintin","Ningning","Ella","Mimi","Maymay","Gingging","Tina","Bebot","Aya","Jaja","Lynlyn","Cheche","Didi","Cathy","Leng","Peachy","Rica","Riri","Bea","Mheng","Faye","Chai","Ate","Pau","Lhei","Joyjoy","Eya","Pinky","Nica","Tete","Mars","Dangdang","Nica","Fritzie","Gigi","Bing","Jheng","Lorie","Annie","Aiza","Lynlyn","Kimkim","Apple","Mitch","Jenjen","Lai","Cecil","Marge","Mai-mai","Tina","Chin-chin","Sasa","Gly","Juvy","Jingjing","Bheng","Hannah","Gemma","Fey-fey","Lynlyn","Jess","Ninay","Lynlyn","Riza","Angge","Love","Femi","Dhang-dhang","Baby","Tess","Yolly","Ems","Teng-teng","Cristy","Jinky","Carla","Bambi","Elsa","Jas","My-my","Chona","Nilda","Shiela","Melai","Cathy","Ria","Tere","Gina","Lalaine","Nitz","Rica","Merry","Gly","Tina","Chai","Diane","Maria","Luz","Carmen","Rosario","Nenita","Grace","Mercedes","Imelda","Marian","Josephine","Gloria","Rosa","Aurora","Lourdes","Aida","Flor","Elena","Concepcion","Estrella","Angelita","Evelyn","Rebecca","Virginia","Cristina","Milagros","Anna","Leonor","Ma. Theresa","Natividad","Anita","Rita","Alicia","Erlinda","Marita","Norma","Edna","Teressa","Elsa","Elvira","Victoria","Amparo","Julia","Aileen","Belen","Patricia","Pilar","Wilma","Helen","Beatriz","Clarita","Ester","Agnes","Marilyn","Myrna","Eva","Linda","Fe","Teresita","Editha","Luningning","Consuelo","Cora","Roberta","Chona","Adela","Lilia","Cecilia","Perla","Alejandra","Divina","Inocencia","Edelmira","Nora","Regina","Angeles","Clara","Salome","Ludivina","Angela","Eduarda","Catalina","Dolores","Maria Clara","Guadalupe","Remedios","Rosita","Caridad","Estela","Florencia","Consolacion","Nieves","Marilou","Elena","Paz","Zenaida","Edith","Margarita","Zosima","Asuncion");
    $last_names = array("Santos","Reyes","Cruz","Garcia","Fernandez","Gonzales","Lopez","Rodriguez","Perez","Martinez","Pascual","Ramos","Dela Cruz","Luna","Aquino","Mendoza","Castillo","Torres","Mariano","Del Rosario","Lim","Gomez","Hernandez","Santiago","Montes","Mercado","Cortez","Sison","Salazar","Miranda","Manalo","Diaz","Villanueva","Velasquez","Bautista","Aguilar","Pangilinan","Zamora","Ramos","Balagtas","Alvarez","Sison","Bautista","Cabrera","Castillo","Del Rosario","Estrada","Francisco","Garcia","Hernandez","Ibanez","Jimenez","Kapunan","Lopez","Molina","Natividad","Ocampo","Panganiban","Quijano","Ramos","Santos","Tolentino","Uy","Valdez","Wong","Yap","Zamora","Abad","Banuelos","Campos","Domingo","Espino","Flores","Gutierrez","Hidalgo","Iglesias","Javier","Lacson","Magno","Nakpil","Ortega","Paredes","Quiambao","Ricafort","Santillan","Tañada","Ubaldo","Velasco","Yambao","Zarate","Austria","Bagtas","Calderon","Dizon","Esguerra","Fuentes","Guzman","Herrera","Ibañez","Joaquin","Legaspi","Magno","Natividad","Ocampo","Paredes","Quezon","Ramos","Santos","Tolentino","Uy","Vargas","Yap","Zamora","Agoncillo","Barretto","Carlos","Dela Peña","Enriquez","Fernandez","Gomez","Hernandez","Iglesias","Javier","Lopez","Mendoza","Nunez","Ocampo","Pascual","Quevedo","Ramos","Santos","Tolentino","Uy","Vargas","Yap","Zamora",);
    $middle_names = $last_names;

    if ($selected_option === 'first_last') {
        $author_name = $first_names[array_rand($first_names)] . ' ' . $last_names[array_rand($last_names)];
    } elseif ($selected_option === 'first_middle_last') {
        $author_name = $first_names[array_rand($first_names)] . ' ' . $middle_names[array_rand($middle_names)] . ' ' . $last_names[array_rand($last_names)];
    } else {
        $author_name = $first_names[array_rand($first_names)];
    }

    return $author_name;
}

function weighted_random($weights) {
    $total = array_sum($weights);
    $random = mt_rand(1, $total);
    foreach ($weights as $option => $weight) {
        $random -= $weight;
        if ($random <= 0) {
            return $option;
        }
    }
}

?>