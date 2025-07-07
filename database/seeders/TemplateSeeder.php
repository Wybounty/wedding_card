<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Carte Classique Élégante',
                'category_name' => 'Classique',
                'html_content' => '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Mariage</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            margin: 0;
            padding: 40px;
            color: #2c3e50;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 60px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 2px solid #d4af37;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #d4af37;
            padding-bottom: 30px;
            margin-bottom: 40px;
        }
        .title {
            font-size: 2.5em;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: normal;
        }
        .subtitle {
            font-size: 1.2em;
            color: #7f8c8d;
            font-style: italic;
        }
        .content {
            text-align: center;
            line-height: 1.8;
            font-size: 1.1em;
        }
        .names {
            font-size: 1.8em;
            color: #d4af37;
            margin: 30px 0;
            font-weight: bold;
        }
        .details {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-left: 4px solid #d4af37;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #d4af37;
            font-style: italic;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">Invitation au Mariage</div>
            <div class="subtitle">Nous avons le plaisir de vous inviter</div>
        </div>
        
        <div class="content">
            <p>Cher(e) {{GUEST_FIRST_NAME}} {{GUEST_LAST_NAME}},</p>
            
            <div class="names">
                {{EVENT_TITLE}}
            </div>
            
            <p>Nous avons le grand honneur de vous inviter à célébrer notre union</p>
            
            <div class="details">
                <p><strong>Date :</strong> {{EVENT_DATE}}</p>
                <p><strong>Heure :</strong> {{EVENT_TIME}}</p>
                <p><strong>Lieu :</strong> {{EVENT_LOCATION}}</p>
            </div>
            
            <p>{{EVENT_DESCRIPTION}}</p>
            
            <p>Votre présence nous honorerait grandement.</p>
        </div>
        
        <div class="footer">
            <p>Merci de confirmer votre présence</p>
            <p>RSVP avant le 15 août 2024</p>
        </div>
    </div>
</body>
</html>',
                'preview_image' => null,
            ],
            [
                'name' => 'Design Moderne Minimaliste',
                'category_name' => 'Moderne',
                'html_content' => '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Mariage</title>
    <style>
        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .title {
            font-size: 2em;
            color: #333;
            margin-bottom: 10px;
            font-weight: 300;
            letter-spacing: 2px;
        }
        .subtitle {
            font-size: 0.9em;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .content {
            text-align: center;
            line-height: 1.6;
        }
        .names {
            font-size: 1.5em;
            color: #333;
            margin: 30px 0;
            font-weight: 300;
        }
        .details {
            margin: 30px 0;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .detail-item {
            margin: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .label {
            font-weight: 500;
            color: #666;
        }
        .value {
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">Invitation</div>
            <div class="subtitle">Mariage</div>
        </div>
        
        <div class="content">
            <p>Bonjour {{GUEST_FIRST_NAME}},</p>
            
            <div class="names">
                {{EVENT_TITLE}}
            </div>
            
            <p>Nous vous invitons à partager ce moment spécial</p>
            
            <div class="details">
                <div class="detail-item">
                    <span class="label">Date</span>
                    <span class="value">{{EVENT_DATE}}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Heure</span>
                    <span class="value">{{EVENT_TIME}}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Lieu</span>
                    <span class="value">{{EVENT_LOCATION}}</span>
                </div>
            </div>
            
            <p>{{EVENT_DESCRIPTION}}</p>
        </div>
        
        <div class="footer">
            <p>Merci de confirmer votre présence</p>
        </div>
    </div>
</body>
</html>',
                'preview_image' => null,
            ],
            [
                'name' => 'Carte Élégante avec Ornements',
                'category_name' => 'Élégant',
                'html_content' => '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Mariage</title>
    <style>
        body {
            font-family: "Playfair Display", Georgia, serif;
            background: linear-gradient(45deg, #f9f9f9 0%, #f0f0f0 100%);
            margin: 0;
            padding: 30px;
            color: #2c2c2c;
        }
        .container {
            max-width: 650px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: 1px solid #e0e0e0;
            position: relative;
        }
        .container::before {
            content: "";
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid #d4af37;
            pointer-events: none;
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }
        .ornament {
            font-size: 2em;
            color: #d4af37;
            margin: 20px 0;
        }
        .title {
            font-size: 2.2em;
            color: #2c2c2c;
            margin: 20px 0;
            font-weight: normal;
            letter-spacing: 1px;
        }
        .subtitle {
            font-size: 1em;
            color: #666;
            font-style: italic;
        }
        .content {
            text-align: center;
            line-height: 1.8;
            font-size: 1.1em;
        }
        .names {
            font-size: 1.8em;
            color: #d4af37;
            margin: 40px 0;
            font-weight: normal;
            letter-spacing: 1px;
        }
        .details {
            margin: 40px 0;
            padding: 30px;
            background: #fafafa;
            border: 1px solid #e0e0e0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: 500;
            color: #666;
        }
        .value {
            color: #2c2c2c;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid #e0e0e0;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="ornament">❦</div>
            <div class="title">Invitation au Mariage</div>
            <div class="subtitle">Nous avons le plaisir de vous inviter</div>
            <div class="ornament">❦</div>
        </div>
        
        <div class="content">
            <p>Cher(e) {{GUEST_FIRST_NAME}} {{GUEST_LAST_NAME}},</p>
            
            <div class="names">
                {{EVENT_TITLE}}
            </div>
            
            <p>Nous avons le grand honneur de vous inviter à célébrer notre union</p>
            
            <div class="details">
                <div class="detail-row">
                    <span class="label">Date</span>
                    <span class="value">{{EVENT_DATE}}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Heure</span>
                    <span class="value">{{EVENT_TIME}}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Lieu</span>
                    <span class="value">{{EVENT_LOCATION}}</span>
                </div>
            </div>
            
            <p>{{EVENT_DESCRIPTION}}</p>
            
            <p>Votre présence nous honorerait grandement.</p>
        </div>
        
        <div class="footer">
            <p>Merci de confirmer votre présence</p>
            <p>RSVP avant le 15 août 2024</p>
        </div>
    </div>
</body>
</html>',
                'preview_image' => null,
            ],
            [
                'name' => 'Design Romantique avec Fleurs',
                'category_name' => 'Romantique',
                'html_content' => '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Mariage</title>
    <style>
        body {
            font-family: "Crimson Text", Georgia, serif;
            background: linear-gradient(135deg, #ffeef8 0%, #f0f8ff 100%);
            margin: 0;
            padding: 30px;
            color: #4a4a4a;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 15px;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: "🌸";
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2em;
            color: #ff69b4;
            opacity: 0.3;
        }
        .container::after {
            content: "🌹";
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2em;
            color: #ff69b4;
            opacity: 0.3;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .title {
            font-size: 2.3em;
            color: #ff69b4;
            margin-bottom: 15px;
            font-weight: normal;
        }
        .subtitle {
            font-size: 1.1em;
            color: #888;
            font-style: italic;
        }
        .content {
            text-align: center;
            line-height: 1.8;
            font-size: 1.1em;
        }
        .names {
            font-size: 1.9em;
            color: #ff69b4;
            margin: 35px 0;
            font-weight: normal;
        }
        .details {
            margin: 35px 0;
            padding: 25px;
            background: linear-gradient(135deg, #fff5f8 0%, #f0f8ff 100%);
            border-radius: 10px;
            border: 1px solid #ffeef8;
        }
        .detail-item {
            margin: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .label {
            font-weight: 500;
            color: #888;
        }
        .value {
            color: #4a4a4a;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid #ffeef8;
            font-style: italic;
            color: #888;
        }
        .hearts {
            font-size: 1.5em;
            color: #ff69b4;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">Invitation au Mariage</div>
            <div class="subtitle">Nous avons le plaisir de vous inviter</div>
        </div>
        
        <div class="content">
            <p>Cher(e) {{GUEST_FIRST_NAME}} {{GUEST_LAST_NAME}},</p>
            
            <div class="names">
                {{EVENT_TITLE}}
            </div>
            
            <p>Nous avons le grand honneur de vous inviter à célébrer notre amour</p>
            
            <div class="details">
                <div class="detail-item">
                    <span class="label">Date</span>
                    <span class="value">{{EVENT_DATE}}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Heure</span>
                    <span class="value">{{EVENT_TIME}}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Lieu</span>
                    <span class="value">{{EVENT_LOCATION}}</span>
                </div>
            </div>
            
            <p>{{EVENT_DESCRIPTION}}</p>
            
            <p>Votre présence nous honorerait grandement.</p>
            
            <div class="hearts">💕 💕 💕</div>
        </div>
        
        <div class="footer">
            <p>Merci de confirmer votre présence</p>
            <p>RSVP avant le 15 août 2024</p>
        </div>
    </div>
</body>
</html>',
                'preview_image' => null,
            ],
            [
                'name' => 'Style Vintage Rétro',
                'category_name' => 'Vintage',
                'html_content' => '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Mariage</title>
    <style>
        body {
            font-family: "Baskerville", "Times New Roman", serif;
            background: #f4f1eb;
            margin: 0;
            padding: 30px;
            color: #2c1810;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #faf8f3;
            padding: 50px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border: 3px solid #8b4513;
            position: relative;
        }
        .container::before {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 1px solid #d2691e;
            pointer-events: none;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #8b4513;
            padding-bottom: 20px;
        }
        .title {
            font-size: 2.2em;
            color: #8b4513;
            margin-bottom: 10px;
            font-weight: normal;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .subtitle {
            font-size: 1em;
            color: #a0522d;
            font-style: italic;
        }
        .content {
            text-align: center;
            line-height: 1.8;
            font-size: 1.1em;
        }
        .names {
            font-size: 1.7em;
            color: #8b4513;
            margin: 30px 0;
            font-weight: normal;
            font-style: italic;
        }
        .details {
            margin: 30px 0;
            padding: 25px;
            background: #f4f1eb;
            border: 2px solid #d2691e;
            border-radius: 5px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin: 12px 0;
            padding: 8px 0;
            border-bottom: 1px solid #d2691e;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #8b4513;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 1px;
        }
        .value {
            color: #2c1810;
            font-style: italic;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid #8b4513;
            font-style: italic;
            color: #a0522d;
        }
        .ornament {
            font-size: 1.5em;
            color: #8b4513;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="ornament">❦ ❦ ❦</div>
            <div class="title">Invitation au Mariage</div>
            <div class="subtitle">Nous avons le plaisir de vous inviter</div>
            <div class="ornament">❦ ❦ ❦</div>
        </div>
        
        <div class="content">
            <p>Cher(e) {{GUEST_FIRST_NAME}} {{GUEST_LAST_NAME}},</p>
            
            <div class="names">
                {{EVENT_TITLE}}
            </div>
            
            <p>Nous avons le grand honneur de vous inviter à célébrer notre union</p>
            
            <div class="details">
                <div class="detail-row">
                    <span class="label">Date</span>
                    <span class="value">{{EVENT_DATE}}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Heure</span>
                    <span class="value">{{EVENT_TIME}}</span>
                </div>
                <div class="detail-row">
                    <span class="label">Lieu</span>
                    <span class="value">{{EVENT_LOCATION}}</span>
                </div>
            </div>
            
            <p>{{EVENT_DESCRIPTION}}</p>
            
            <p>Votre présence nous honorerait grandement.</p>
        </div>
        
        <div class="footer">
            <p>Merci de confirmer votre présence</p>
            <p>RSVP avant le 15 août 2024</p>
        </div>
    </div>
</body>
</html>',
                'preview_image' => null,
            ],
        ];

        foreach ($templates as $templateData) {
            $category = Category::where('name', $templateData['category_name'])->first();
            
            if ($category) {
                Template::firstOrCreate([
                    'name' => $templateData['name'],
                    'category_id' => $category->id,
                ], [
                    'html_content' => $templateData['html_content'],
                    'preview_image' => $templateData['preview_image'],
                ]);
            }
        }

        $this->command->info('Templates créés avec succès !');
    }
}
