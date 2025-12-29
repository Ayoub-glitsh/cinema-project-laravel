<!DOCTYPE html>
<html>
<head>
    <title>Stagiaires</title>
</head>
<body>
<h1>Liste des Stagiaire</h1>
<ul>
@foreach (["Ali", "Sara", "Omar", "Khadija"] as $stagiaire)
<li>{{ $stagiaire}}</li>
@endforeach

        
        
</ul>

</body>
</html>