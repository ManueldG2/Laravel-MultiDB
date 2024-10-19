<div class="overflow-auto p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Dashboard
    </h1>

    <p class=" mt-6 text-gray-500 leading-relaxed">
        Pannello di controllo per gestire gli articoli dati prelevati database Mysql

        Api
lista endpoint e come accedere con il token barer

<pre>curl http://localhost:8000/api/user    -H "Accept: application/json"   -H "Authorization: Bearer {token}"</pre>

es.:

<pre>curl http://localhost:8000/api/user    -H "Accept: application/json"   -H "Authorization: Bearer aaaaaaaaaaAAAAAAAAAAAAAA222222222222244444444444"</pre>

risposta es.:

<pre>{"id":1,"name":"user","email":"user@email.it","email_verified_at":null,"current_team_id":null,"profile_photo_path":null,"created_at":"2024-10-14T08:01:49.000000Z","updated_at":"2024-10-14T08:01:49.000000Z","two_factor_confirmed_at":null,"profile_photo_url":"https:\/\/ui-avatars.com\/api\/?name=m&color=7F9CF5&background=EBF4FF"}</pre>
    </p>

</div>

