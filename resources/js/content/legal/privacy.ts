import type { LegalContent } from '@/components/legal/LegalDocument.vue';

export const privacy: Record<string, LegalContent> = {
    ro: {
        badge: 'Legal · Confidențialitate',
        title: 'Politica de confidențialitate',
        subtitle: 'Protecția datelor pe mindventure.ro',
        lastUpdated: 'Ultima actualizare: iulie 2026',
        sections: [
            {
                heading: '1. Dispoziții generale',
                blocks: [
                    {
                        type: 'p',
                        text: 'Această Politică de confidențialitate descrie modul în care sunt colectate, utilizate și protejate datele cu caracter personal în legătură cu utilizarea site-ului mindventure.ro. Prelucrarea datelor se realizează în conformitate cu legislația aplicabilă privind protecția datelor.',
                    },
                    {
                        type: 'p',
                        text: 'Prin utilizarea site-ului confirmi că ai citit și ai înțeles prezenta Politică. Dacă nu ești de acord cu prevederile acesteia, te rugăm să nu folosești site-ul.',
                    },
                ],
            },
            {
                heading: '2. Operatorul datelor',
                blocks: [
                    {
                        type: 'p',
                        text: 'Site-ul mindventure.ro este deținut și operat sub brandul Mindventure. Operatorul datelor cu caracter personal este persoana sau entitatea care administrează site-ul și gestionează comunicarea cu utilizatorii.',
                    },
                    {
                        type: 'p',
                        text: 'Pentru orice întrebări legate de protecția datelor, ne poți contacta la:',
                    },
                    { type: 'list', items: ['Email: contact@mindventure.ro'] },
                ],
            },
            {
                heading: '3. Ce date colectăm',
                blocks: [
                    {
                        type: 'p',
                        text: 'Site-ul poate fi accesat fără a fi necesară crearea unui cont de utilizator. Folosim instrumente de analiză și de marketing (Google Analytics 4 și Meta Pixel), însă acestea sunt încărcate doar dacă îți dai acordul din bannerul de cookie-uri — vezi secțiunea 11.',
                    },
                    {
                        type: 'p',
                        text: 'Putem prelucra însă datele pe care le furnizezi în mod voluntar, de exemplu:',
                    },
                    {
                        type: 'list',
                        items: [
                            'nume și prenume;',
                            'adresă de email;',
                            'număr de telefon (dacă îl introduci în formular sau email);',
                            'orice alte informații incluse în mesajele transmise prin formularul de contact sau direct prin email.',
                        ],
                    },
                ],
            },
            {
                heading: '4. Scopurile prelucrării',
                blocks: [
                    {
                        type: 'p',
                        text: 'Datele pot fi utilizate pentru următoarele scopuri:',
                    },
                    {
                        type: 'list',
                        items: [
                            'pentru a răspunde solicitărilor și întrebărilor tale;',
                            'pentru a organiza și gestiona programările sau participarea la programele Mindventure;',
                            'pentru comunicări administrative legate de activitatea Mindventure;',
                            'pentru a asigura funcționarea și securitatea site-ului.',
                        ],
                    },
                ],
            },
            {
                heading: '5. Temeiul legal al prelucrării',
                blocks: [
                    {
                        type: 'p',
                        text: 'În funcție de context, prelucrarea datelor tale se poate baza pe unul sau mai multe dintre următoarele temeiuri:',
                    },
                    {
                        type: 'list',
                        items: [
                            'consimțământul tău, atunci când alegi să ne trimiți date prin formulare sau email;',
                            'interesul legitim al Mindventure, pentru a putea răspunde solicitărilor tale, a organiza activitatea și a menține securitatea site-ului;',
                            'îndeplinirea unor obligații legale, acolo unde este cazul (de exemplu, obligații contabile sau fiscale pentru plăți și facturare).',
                        ],
                    },
                ],
            },
            {
                heading: '6. Durata de stocare a datelor',
                blocks: [
                    {
                        type: 'p',
                        text: 'Datele sunt păstrate doar atât timp cât este necesar pentru îndeplinirea scopurilor de mai sus sau pentru perioadele impuse de lege. În general:',
                    },
                    {
                        type: 'list',
                        items: [
                            'datele din corespondența generală (emailuri, mesaje din formular) se păstrează pe durata necesară soluționării solicitării și pentru o perioadă suplimentară rezonabilă pentru evidență internă;',
                            'datele care trebuie păstrate conform legii (de exemplu, documente financiar-contabile) se arhivează pe perioada prevăzută de normele legale aplicabile.',
                        ],
                    },
                ],
            },
            {
                heading: '7. Divulgarea datelor către terți',
                blocks: [
                    {
                        type: 'p',
                        text: 'Nu vindem și nu închiriem datele tale cu caracter personal către terți.',
                    },
                    {
                        type: 'p',
                        text: 'Datele pot fi totuși comunicate unor terți în situații limitate, cum ar fi:',
                    },
                    {
                        type: 'list',
                        items: [
                            'furnizori de servicii tehnice (de exemplu, hosting), doar în măsura în care acest lucru este necesar pentru funcționarea site-ului;',
                            'Google Ireland Limited și Meta Platforms Ireland Limited, pentru statistici de utilizare și măsurarea campaniilor publicitare — numai dacă ai acceptat cookie-urile de analiză și marketing (vezi secțiunea 11);',
                            'autorități publice sau instituții, atunci când suntem obligați prin lege sau în baza unor solicitări oficiale.',
                        ],
                    },
                ],
            },
            {
                heading: '8. Transferul datelor în afara UE/SEE',
                blocks: [
                    {
                        type: 'p',
                        text: 'Nu avem ca scop, în mod intenționat, transferul datelor tale cu caracter personal către state din afara Uniunii Europene sau Spațiului Economic European. Dacă în viitor va fi necesar un astfel de transfer, acesta va fi realizat doar cu implementarea garanțiilor prevăzute de legislația privind protecția datelor.',
                    },
                    {
                        type: 'p',
                        text: 'Dacă accepți cookie-urile de analiză și marketing, Google și Meta pot prelucra datele respective și pe servere din Statele Unite. Ambele companii sunt certificate în cadrul EU–U.S. Data Privacy Framework, care asigură un nivel adecvat de protecție conform deciziei Comisiei Europene.',
                    },
                ],
            },
            {
                heading: '9. Securitatea datelor',
                blocks: [
                    {
                        type: 'p',
                        text: 'Luăm măsuri rezonabile pentru a proteja datele tale personale împotriva pierderii, accesului neautorizat sau divulgării, utilizând furnizori reputați de găzduire și măsuri tehnice și organizatorice adecvate.',
                    },
                    {
                        type: 'p',
                        text: 'Totuși, trebuie să ții cont că nicio transmisie de date prin internet nu poate fi garantată ca fiind complet sigură.',
                    },
                ],
            },
            {
                heading: '10. Drepturile tale',
                blocks: [
                    {
                        type: 'p',
                        text: 'În funcție de legislația aplicabilă, poți avea următoarele drepturi cu privire la datele tale personale:',
                    },
                    {
                        type: 'list',
                        items: [
                            'dreptul de acces la date;',
                            'dreptul la rectificarea datelor inexacte sau incomplete;',
                            'dreptul la ștergerea datelor („dreptul de a fi uitat”), în condițiile legii;',
                            'dreptul la restricționarea prelucrării;',
                            'dreptul de opoziție la anumite prelucrări bazate pe interes legitim;',
                            'dreptul la portabilitatea datelor, în cazurile prevăzute de lege;',
                            'dreptul de a depune o plângere la autoritatea competentă de protecție a datelor. Pentru România, aceasta este Autoritatea Națională de Supraveghere a Prelucrării Datelor cu Caracter Personal (ANSPDCP) – www.dataprotection.ro.',
                        ],
                    },
                    {
                        type: 'p',
                        text: 'Pentru exercitarea acestor drepturi, ne poți contacta la contact@mindventure.ro, descriind clar cererea și contextul în care au fost furnizate datele.',
                    },
                ],
            },
            {
                heading: '11. Cookie-uri și tehnologii similare',
                blocks: [
                    {
                        type: 'p',
                        text: 'Site-ul mindventure.ro folosește cookie-uri strict necesare funcționării (de exemplu, cookie-ul de sesiune, cel de securitate CSRF, limba selectată și opțiunea ta privind cookie-urile). Acestea nu necesită consimțământ.',
                    },
                    {
                        type: 'p',
                        text: 'În plus, folosim cookie-uri de analiză și de marketing, care se activează numai după ce îți exprimi acordul din bannerul afișat la prima vizită:',
                    },
                    {
                        type: 'list',
                        items: [
                            'Google Analytics 4, încărcat prin Google Tag Manager — statistici despre paginile vizitate și despre acțiunile din site (cookie-uri de tip _ga);',
                            'Meta Pixel (Facebook) — măsurarea eficienței campaniilor publicitare și afișarea de reclame relevante (cookie-uri de tip _fbp, _fbc);',
                            'Meta Conversions API — transmiterea către Meta, direct de pe serverul nostru, a formularelor de programare trimise, pentru aceleași scopuri de măsurare. Datele de contact (email, telefon, nume) sunt transmise doar sub formă criptată ireversibil (hash SHA-256).',
                        ],
                    },
                    {
                        type: 'p',
                        text: 'Dacă refuzi, niciunul dintre aceste instrumente nu este încărcat și nu se transmite nimic către Google sau Meta. Îți poți schimba opțiunea oricând din linkul „Preferințe cookie-uri” aflat în subsolul site-ului. Opțiunea ta este reținută timp de 6 luni.',
                    },
                ],
            },
            {
                heading: '12. Modificarea Politicii de confidențialitate',
                blocks: [
                    {
                        type: 'p',
                        text: 'Putem modifica periodic această Politică de confidențialitate pentru a reflecta schimbări legislative sau modificări ale modului de funcționare a site-ului. Versiunea actualizată va fi publicată pe această pagină.',
                    },
                ],
            },
        ],
    },

    en: {
        badge: 'Legal · Privacy',
        title: 'Privacy policy',
        subtitle: 'Data protection on mindventure.ro',
        lastUpdated: 'Last updated: July 2026',
        sections: [
            {
                heading: '1. General provisions',
                blocks: [
                    {
                        type: 'p',
                        text: 'This Privacy Policy describes how personal data is collected, used, and protected in connection with the use of the mindventure.ro website. Data is processed in accordance with the applicable data protection legislation.',
                    },
                    {
                        type: 'p',
                        text: 'By using the site, you confirm that you have read and understood this Policy. If you do not agree with its provisions, please do not use the site.',
                    },
                ],
            },
            {
                heading: '2. The data controller',
                blocks: [
                    {
                        type: 'p',
                        text: 'The mindventure.ro website is owned and operated under the Mindventure brand. The controller of personal data is the person or entity that administers the site and manages communication with users.',
                    },
                    {
                        type: 'p',
                        text: 'For any questions regarding data protection, you can contact us at:',
                    },
                    { type: 'list', items: ['Email: contact@mindventure.ro'] },
                ],
            },
            {
                heading: '3. What data we collect',
                blocks: [
                    {
                        type: 'p',
                        text: 'The site can be accessed without creating a user account. We do use analytics and marketing tools (Google Analytics 4 and the Meta Pixel), but they are only loaded if you agree via the cookie banner — see section 11.',
                    },
                    {
                        type: 'p',
                        text: 'We may, however, process the data you provide voluntarily, for example:',
                    },
                    {
                        type: 'list',
                        items: [
                            'first and last name;',
                            'email address;',
                            'phone number (if you enter it in the form or by email);',
                            'any other information included in messages sent through the contact form or directly by email.',
                        ],
                    },
                ],
            },
            {
                heading: '4. Purposes of processing',
                blocks: [
                    {
                        type: 'p',
                        text: 'The data may be used for the following purposes:',
                    },
                    {
                        type: 'list',
                        items: [
                            'to respond to your requests and questions;',
                            'to arrange and manage bookings or participation in Mindventure programs;',
                            'for administrative communications relating to Mindventure activities;',
                            'to ensure the operation and security of the site.',
                        ],
                    },
                ],
            },
            {
                heading: '5. Legal basis for processing',
                blocks: [
                    {
                        type: 'p',
                        text: 'Depending on the context, the processing of your data may be based on one or more of the following grounds:',
                    },
                    {
                        type: 'list',
                        items: [
                            'your consent, when you choose to send us data through forms or email;',
                            'the legitimate interest of Mindventure, in order to respond to your requests, organize activities, and maintain the security of the site;',
                            'compliance with legal obligations, where applicable (for example, accounting or tax obligations for payments and invoicing).',
                        ],
                    },
                ],
            },
            {
                heading: '6. Data retention period',
                blocks: [
                    {
                        type: 'p',
                        text: 'Data is kept only for as long as necessary to fulfil the purposes above or for the periods required by law. In general:',
                    },
                    {
                        type: 'list',
                        items: [
                            'data from general correspondence (emails, form messages) is kept for the time needed to resolve the request and for a reasonable additional period for internal records;',
                            'data that must be kept by law (for example, financial and accounting documents) is archived for the period provided by the applicable legal rules.',
                        ],
                    },
                ],
            },
            {
                heading: '7. Disclosure of data to third parties',
                blocks: [
                    {
                        type: 'p',
                        text: 'We do not sell or rent your personal data to third parties.',
                    },
                    {
                        type: 'p',
                        text: 'Data may nevertheless be shared with third parties in limited situations, such as:',
                    },
                    {
                        type: 'list',
                        items: [
                            'technical service providers (for example, hosting), only to the extent necessary for the operation of the site;',
                            'Google Ireland Limited and Meta Platforms Ireland Limited, for usage statistics and advertising campaign measurement — only if you accepted analytics and marketing cookies (see section 11);',
                            'public authorities or institutions, when we are required to do so by law or on the basis of official requests.',
                        ],
                    },
                ],
            },
            {
                heading: '8. Transfer of data outside the EU/EEA',
                blocks: [
                    {
                        type: 'p',
                        text: 'We do not intentionally transfer your personal data to countries outside the European Union or the European Economic Area. If such a transfer becomes necessary in the future, it will be carried out only with the safeguards provided by data protection legislation in place.',
                    },
                    {
                        type: 'p',
                        text: 'If you accept analytics and marketing cookies, Google and Meta may also process that data on servers in the United States. Both companies are certified under the EU–U.S. Data Privacy Framework, which the European Commission has recognised as providing an adequate level of protection.',
                    },
                ],
            },
            {
                heading: '9. Data security',
                blocks: [
                    {
                        type: 'p',
                        text: 'We take reasonable measures to protect your personal data against loss, unauthorized access, or disclosure, using reputable hosting providers and appropriate technical and organizational measures.',
                    },
                    {
                        type: 'p',
                        text: 'However, you should bear in mind that no transmission of data over the internet can be guaranteed to be completely secure.',
                    },
                ],
            },
            {
                heading: '10. Your rights',
                blocks: [
                    {
                        type: 'p',
                        text: 'Depending on the applicable legislation, you may have the following rights regarding your personal data:',
                    },
                    {
                        type: 'list',
                        items: [
                            'the right of access to your data;',
                            'the right to rectification of inaccurate or incomplete data;',
                            'the right to erasure of data (the “right to be forgotten”), under the conditions of the law;',
                            'the right to restriction of processing;',
                            'the right to object to certain processing based on legitimate interest;',
                            'the right to data portability, in the cases provided by law;',
                            'the right to lodge a complaint with the competent data protection authority. For Romania, this is the National Supervisory Authority for Personal Data Processing (ANSPDCP) – www.dataprotection.ro.',
                        ],
                    },
                    {
                        type: 'p',
                        text: 'To exercise these rights, you can contact us at contact@mindventure.ro, clearly describing your request and the context in which the data was provided.',
                    },
                ],
            },
            {
                heading: '11. Cookies and similar technologies',
                blocks: [
                    {
                        type: 'p',
                        text: 'The mindventure.ro website uses cookies that are strictly necessary for it to work (for example the session cookie, the CSRF security cookie, the selected language and your cookie choice). These do not require consent.',
                    },
                    {
                        type: 'p',
                        text: 'We also use analytics and marketing cookies, which are only activated once you agree via the banner shown on your first visit:',
                    },
                    {
                        type: 'list',
                        items: [
                            'Google Analytics 4, loaded through Google Tag Manager — statistics about the pages visited and the actions taken on the site (_ga cookies);',
                            'Meta Pixel (Facebook) — measuring how our advertising campaigns perform and showing relevant ads (_fbp, _fbc cookies);',
                            'Meta Conversions API — sending booking form submissions to Meta directly from our server, for the same measurement purposes. Contact details (email, phone, name) are only ever sent irreversibly encrypted (SHA-256 hash).',
                        ],
                    },
                    {
                        type: 'p',
                        text: 'If you decline, none of these tools are loaded and nothing is sent to Google or Meta. You can change your choice at any time from the "Cookie preferences" link in the site footer. Your choice is remembered for 6 months.',
                    },
                ],
            },
            {
                heading: '12. Changes to the Privacy Policy',
                blocks: [
                    {
                        type: 'p',
                        text: 'We may periodically amend this Privacy Policy to reflect legislative changes or changes in how the site operates. The updated version will be published on this page.',
                    },
                ],
            },
        ],
    },
};
