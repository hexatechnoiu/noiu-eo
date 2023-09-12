<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurteamController extends Controller
{
    public function index()
    {
        $teamMembers = [
            [
                'name' => 'Hafiz Haekal',
                'position' => 'Fullstack Developer',
                'image' => 'img/team/hafiz.jpg',
                'socialLinks' => [
                    [
                        'url' => 'https://wa.me/087894818815/',
                        'iconClass' => 'fa-brands fa-whatsapp',
                    ],
                    [
                        'url' => 'https://www.instagram.com/hafizhaekall/',
                        'iconClass' => 'fa-brands fa-instagram',
                    ],
                    [
                        'url' => 'https://www.github.com/hafizhaekall/',
                        'iconClass' => 'fa-brands fa-github',
                    ],
                    [
                        'url' => 'https://www.linkedin.com/in/hafizhaekal/',
                        'iconClass' => 'fa-brands fa-linkedin-in',
                    ],
                ],
            ],
            [
                'name' => 'Muhammad Azfa Salman Akbar',
                'position' => 'Back End Developer',
                'image' => 'img/team/azfa.jpg',
                'socialLinks' => [
                    [
                        'url' => 'https://wa.me/085156105763/',
                        'iconClass' => 'fa-brands fa-whatsapp',
                    ],
                    [
                        'url' => 'https://www.instagram.com/azfasa15/',
                        'iconClass' => 'fa-brands fa-instagram',
                    ],
                    [
                        'url' => 'https://www.github.com/rodeobazaar124/',
                        'iconClass' => 'fa-brands fa-github',
                    ],
                    [
                        'url' => 'https://www.linkedin.com/in/azfasalman/',
                        'iconClass' => 'fa-brands fa-linkedin-in',
                    ],
                ],
            ],
            [
                'name' => 'M Ghazy M A',
                'position' => 'Front End Developer',
                'image' => 'img/team/ghazy.jpg',
                'socialLinks' => [
                    [
                        'url' => 'https://wa.me/085158266733/',
                        'iconClass' => 'fa-brands fa-whatsapp',
                    ],
                    [
                        'url' => 'https://instagram.com/en0kich4n/',
                        'iconClass' => 'fa-brands fa-instagram',
                    ],
                    [
                        'url' => 'https://github.com/en0kich4n/',
                        'iconClass' => 'fa-brands fa-github',
                    ],
                    [
                        'url' => 'https://www.linkedin.com/in/xylviet/',
                        'iconClass' => 'fa-brands fa-linkedin-in',
                    ],
                ],
            ],
            [
                'name' => 'Ristin Iman Andini',
                'position' => 'Copywriter',
                'image' => 'img/team/ristin.jpg',
                'socialLinks' => [
                    [
                        'url' => 'https://wa.me/qr/AC44YKCYABNLM1/',
                        'iconClass' => 'fa-brands fa-whatsapp',
                    ],
                    [
                        'url' => 'https://www.instagram.com/ristinnandnnii_/',
                        'iconClass' => 'fa-brands fa-instagram',
                    ],
                    [
                        'url' => 'https://github.com/RistinAndini78/',
                        'iconClass' => 'fa-brands fa-github',
                    ],
                    [
                        'url' => 'https://www.linkedin.com/in/ristin-iman-andini-896a44287/',
                        'iconClass' => 'fa-brands fa-linkedin-in',
                    ],
                ],
            ],
            [
                'name' => 'Della Friska Ardiana',
                'position' => 'UI / UX Designer',
                'image' => 'img/team/della.jpg',
                'socialLinks' => [
                    [
                        'url' => 'https://wa.me/085927778314/',
                        'iconClass' => 'fa-brands fa-whatsapp',
                    ],
                    [
                        'url' => 'https://instagram.com/dllaa.te/',
                        'iconClass' => 'fa-brands fa-instagram',
                    ],
                    [
                        'url' => 'https://github.com/dellafan/',
                        'iconClass' => 'fa-brands fa-github',
                    ],
                    [
                        'url' => 'https://www.linkedin.com/in/della-friska-ardiana-1bb587290/',
                        'iconClass' => 'fa-brands fa-linkedin-in',
                    ],
                ],
            ],
            [
                'name' => 'Siti Nuraini Maryam',
                'position' => 'UI / UX Designer',
                'image' => 'img/team/aini.jpg',
                'socialLinks' => [
                    [
                        'url' => 'https://wa.me/081902776222/',
                        'iconClass' => 'fa-brands fa-whatsapp',
                    ],
                    [
                        'url' => 'https://instagram.com/stnrainimrym_/',
                        'iconClass' => 'fa-brands fa-instagram',
                    ],
                    [
                        'url' => 'https://github.com/SitiNurainiMaryam6/',
                        'iconClass' => 'fa-brands fa-github',
                    ],
                    [
                        'url' => 'https://www.linkedin.com/in/siti-nuraini-maryam-81225a290/',
                        'iconClass' => 'fa-brands fa-linkedin-in',
                    ],
                ],
            ],
        ];

        return view('contact', compact('teamMembers'));
    }
}
