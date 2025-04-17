{{-- resources/views/partials/card.blade.php --}}
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:400,100,900');
    .wrapper {
        display: table;
        width: 100%;
        height: 100%;
    }
    .container-fostrap {
        display: table-cell;
        padding: 1em;
        text-align: center;
        vertical-align: middle;
    }
    .fostrap-logo {
        width: 100px;
        margin-bottom: 15px;
    }
    h1.heading {
        font-size: 2.5rem;
        font-weight: 900;
        color: #505050;
    }
    .card {
        margin-bottom: 20px;
        border-radius: 2px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.16), 0 2px 10px rgba(0,0,0,0.12);
        transition: box-shadow .25s;
    }
    .card:hover {
        box-shadow: 0 8px 17px rgba(0,0,0,0.2), 0 6px 20px rgba(0,0,0,0.19);
    }
    .img-card {
        height: 200px;
        overflow: hidden;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
    }
    .img-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: all .25s ease;
    }
    .card-content {
        padding: 15px;
        text-align: left;
    }
    .card-title {
        font-size: 1.65em;
        font-weight: 700;
    }
    .card-title a {
        text-decoration: none;
        color: #000;
    }
    .card-read-more {
        border-top: 1px solid #ddd;
        padding: 10px;
    }
    .region-description {
        display: none;
        font-size: 0.95em;
        color: #555;
        padding: 0 15px 15px;
    }
</style>

<section class="wrapper">
    <div class="container-fostrap">
        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-3 g-4" id="regionCards">
                <!-- Le card saranno inserite dinamicamente -->
            </div>
        </div>
    </div>
</section>

<script>
    const regioni = [
        {
            nome: "Lazio",
            descrizione: "Il Lazio è una regione ricca di storia, con Roma, la capitale d'Italia, al centro.",
            dettagli: "Il Lazio offre monumenti antichi, paesaggi mozzafiato e una gastronomia unica. Da non perdere Roma, con il Colosseo e il Vaticano."
        },
        {
            nome: "Toscana",
            descrizione: "La Toscana è famosa per i suoi paesaggi collinari, i vigneti e città d'arte come Firenze e Pisa.",
            dettagli: "È il cuore della cultura italiana. I borghi, i vini e i musei rendono la Toscana una meta imperdibile."
        },
        {
            nome: "Sicilia",
            descrizione: "La Sicilia è un'isola ricca di cultura, storia e natura, con il mare cristallino e il vulcano Etna.",
            dettagli: "Una terra di contrasti, tra tradizioni antiche e paesaggi spettacolari. Da visitare assolutamente."
        }
    ];

    const container = document.getElementById("regionCards");

    regioni.forEach((regione, index) => {
        const id = regione.nome.toLowerCase();
        const imgSrc = `img/${id}.jpg`;

        const card = document.createElement("div");
        card.className = "col";

        card.innerHTML = `
            <div class="card">
                <div class="img-card" onclick="toggleDescrizione('${id}')">
                    <img src="${imgSrc}" alt="${regione.nome}" />
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        <a href="javascript:void(0)" onclick="toggleDescrizione('${id}')">${regione.nome}</a>
                    </h4>
                    <p>${regione.descrizione}</p>
                </div>
                <div id="${id}" class="region-description">${regione.dettagli}</div>
            </div>
        `;
        container.appendChild(card);
    });

    function toggleDescrizione(id) {
        const el = document.getElementById(id);
        el.style.display = el.style.display === "block" ? "none" : "block";
    }
</script>

<!-- Se necessario, includi eventuali JS di Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
