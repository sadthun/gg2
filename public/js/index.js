// Funzione per gestire il click sul bottone che mostra o nasconde la mappa
document.getElementById("toggleMapButton").addEventListener("click", function() {
    var mapContainer = document.getElementById("map-container");
    var button = document.getElementById("toggleMapButton");

    // Se la mappa è nascosta o non visibile, mostralo e modifica il testo del bottone
    if (mapContainer.style.display === "none" || mapContainer.style.display === "") {
        mapContainer.style.display = "block";
        button.textContent = "Chiudi Mappa";
    } else {
        mapContainer.style.display = "none";
        button.textContent = "Seleziona Regione";
    }
});


fetch('card.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('card-placeholder').innerHTML = data;
    })
    .catch(error => {
        console.error('Errore nel caricamento delle card:', error);
    });
