document.addEventListener("DOMContentLoaded", function() {
    let svgObject = document.getElementById("mappaItalia");

    svgObject.addEventListener("load", function() {
        let svgDoc = svgObject.contentDocument;
        let regions = svgDoc.querySelectorAll("path"); // Se l'SVG usa <path> per le regioni
        let regionListItems = document.querySelectorAll("#region-list li");

        // Funzione per trovare l'elemento della lista corrispondente all'ID della regione
        function getListItem(regionId) {
            return document.querySelector(`#region-list li[data-region="${regionId}"]`);
        }

        // Eventi sulla LISTA (highlight sulla MAPPA)
        regionListItems.forEach(item => {
            let regionId = item.getAttribute("data-region");
            let region = svgDoc.getElementById(regionId);

            if (region) {
                item.addEventListener("mouseover", function() {
                    region.style.fill = "blue"; // Colore quando si passa sopra la lista
                });
                item.addEventListener("mouseout", function() {
                    region.style.fill = ""; // Reset colore
                });
            }
        });

        // Eventi sulla MAPPA (highlight sulla LISTA)
        regions.forEach(region => {
            let regionId = region.id;
            let listItem = getListItem(regionId);

            if (listItem) {
                region.addEventListener("mouseover", function() {
                    listItem.classList.add("highlight");
                });
                region.addEventListener("mouseout", function() {
                    listItem.classList.remove("highlight");
                });
            }
        });

        // Funzione per alternare la visibilità della mappa
        function toggleMap() {
            let mapContainer = document.getElementById("map-container");
            let button = document.getElementById("toggleMapButton");

            if (mapContainer.style.display === "none" || mapContainer.style.display === "") {
                mapContainer.style.display = "block";
                button.textContent = "Chiudi Mappa";
                button.classList.remove("btn-primary");
                button.classList.add("btn-danger"); // Cambia colore in rosso per chiudere
            } else {
                mapContainer.style.display = "none";
                button.textContent = "Seleziona Regione";
                button.classList.remove("btn-danger");
                button.classList.add("btn-primary"); // Ritorna al colore originale
            }
        }

        // Aggiungere l'evento di clic al bottone per aprire/chiudere la mappa
        document.getElementById("toggleMapButton").addEventListener("click", toggleMap);
    });
});
