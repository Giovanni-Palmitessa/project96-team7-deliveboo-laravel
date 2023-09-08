<h1 style="text-align:center; font-family:sans-serif;font-size:2rem;padding-top:2rem;">Nuovo Ordine Ricevuto</h1>

<div style="font-family:sans-serif;">
    <h2 style="font-size:2rem;padding-bottom:2rem;">Dati Utente</h2>

    <ul>
        <li>Nome Cliente: {{$lead->name}}</li>
        
        <li>Cognome Cliente: {{$lead->surname}}</li>
        
        <li>Email Cliente: {{$lead->email}}</li>
    </ul>

    <h2>Messaggio Cliente: {{$lead->message}}</h2>
</div>
