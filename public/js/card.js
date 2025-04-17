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
            <h4 class="card-title"><a href="javascript:void(0)" onclick="toggleDescrizione('${id}')">${regione.nome}</a></h4>
            <p>${regione.descrizione}</p>
          </div>
          <div class="card-read-more">
            <a href="javascript:void(0)" class="btn btn-link btn-block" onclick="toggleDescrizione('${id}')">Scopri di più</a>
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