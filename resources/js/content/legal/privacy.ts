import type { LegalContent } from '@/components/legal/LegalDocument.vue';

export const privacy: Record<string, LegalContent> = {
    ro: {
        badge: 'Legal · Confidențialitate',
        title: 'Politica de confidențialitate',
        subtitle: 'Protecția datelor pe mindventure.ro',
        lastUpdated: 'Ultima actualizare: noiembrie 2025',
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
                        text: 'Site-ul poate fi accesat fără a fi necesară crearea unui cont de utilizator. Nu folosim în prezent instrumente de analiză de tip Google Analytics și nu setăm cookie-uri de tracking sau marketing.',
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
                        text: 'În prezent, site-ul mindventure.ro nu utilizează cookie-uri de analiză sau de marketing și nu încarcă scripturi de tracking (de exemplu, Google Analytics).',
                    },
                    {
                        type: 'p',
                        text: 'Dacă în viitor vor fi instalate cookie-uri suplimentare sau vor fi folosite instrumente de analiză, politica privind cookie-urile va fi actualizată, iar utilizatorii vor putea să își gestioneze preferințele de consimțământ.',
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
        lastUpdated: 'Last updated: November 2025',
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
                        text: 'The site can be accessed without creating a user account. We do not currently use analytics tools such as Google Analytics, and we do not set tracking or marketing cookies.',
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
                        text: 'At present, the mindventure.ro website does not use analytics or marketing cookies and does not load tracking scripts (for example, Google Analytics).',
                    },
                    {
                        type: 'p',
                        text: 'If additional cookies are installed in the future, or analytics tools are used, the cookie policy will be updated and users will be able to manage their consent preferences.',
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
