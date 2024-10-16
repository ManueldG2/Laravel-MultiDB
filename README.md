# Laravel-MultiDb

 Mobiletto-pop

Progetto di Tirocinio alternativo fatto in Iagica per Mobiletti in supermercati

    prodotti prelevati/acquistati tipo quantità ora (insererimento, uscita)

    2 server in contemporanea e interroga un terzo db per altri dati espone servizi web come API usando Oauth2

    dati statistici grafici chart.js andamento delle vendite e di tipo commerciale quanti prodotti nel mobiletto e quale è stato acquistato in che orario (data - giorno della settimana )

#Procedimento nel file .env definisco la configurazione per due DB per esempio ho usato Sqlite e Mysql

 DB_CONNECTION=sqlite

 DB_MYSQL=mysql

 DB_HOST=127.0.0.1

 DB_PORT=3306

 DB_DATABASE=mobiletto

 DB_USERNAME=root

 DB_PASSWORD=

config/database.php

 'default' => env('DB_CONNECTION', 'sqlite'),

 'mysql' => env('DB_MYSQL', 'mysql'),

controllare in connections che le chiavi corrispondano ai valori presi dal file .env

ora quando devo lavorare sui dati

 $user = new User();

 dump($user->setConnection('mysql')->select('*')->get()); //lavoro con il db secondario (sto cercando un modo per accedere ai metodi statici )

 dump(User::all()); //uso il db di default

per le eventuali richieste ad un server che richiedo dei dati in modo sporadico credo sarebbe meglio usare delle API 

    $api=Http::get('https://api.chucknorris.io/jokes/random'); // richiesta API

    $api->json(); // prende i dati json

    $value = $api['value']; // recupero dati con chiave value 

    uso di queue o un'altro sistema per effettuare una chiamata all'api ogni x minuti

    da fare:
     - il progetto può essere ampliato anche da altre tabelle relazionali e funzionalità ma per ora do precedenza a come usare più database acquisizione dati da fonti esterne autenticazione Auth0 uso di code (queue)
  
     - v aggiungere campi utili : prodotti prelevati/inseriti  quantità ora (inserimento, uscita) fatta da controllare
     
     - esporre API con token Auth2.0 
     
     - v creare grafici https://icehouse-ventures.github.io/laravel-chartjs/ aggiunta la libreria configurata ora da vedere quali dati passare
     
     - sistermare i template per article fatti controllare il resto 
     
     - per usare 2 server in contemporanea dovrei usare il server locale per le modifiche ai prodotti che poi aggiornerò sul server esterno  lo ritengo poco funzionale in questo caso 
     
     - v da finire e CORREGGERE aggiungere al model fillable e validation e inoltre i messaggi in caso di aggiornamento / cancellazione errore o mancata validazione aggiungere old() dentro la form

    

