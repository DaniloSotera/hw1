var button = document.getElementById("tamburi");
var audio = document.getElementById("myAudio");
let flag = 0;
var button_preference;
footerFunction();

fetch("richiesta_modale_out.php").then(onResponse).then(onJson);
function footerFunction() {
  fetch("richiesta_titoli_feste.php").then(response => response.json()).then(dati =>{
    for(let i = 0;i<dati.length;i++)
      {
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.textContent = dati[i].titolo;
        li.appendChild(a);
        document.querySelector(".festivals").appendChild(li);
        //se si clicca sul link ti porta alla sezione eventi
        a.addEventListener("click", function() {
          //scrollare alla sezione eventi
          const eventi = document.querySelector("#presentazione_eventi");          
          eventi.scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});          
        });
      }
  });
}

function onResponse(response){
  console.log(response);
  return response.json();
}

function onResponse2(response){ //ne servono due?
  console.log(response);
  return response.json();
}

function onJson(json){
  console.log(json);
  for(let  i = 0; i < json.length; i++){
    const div = document.createElement("div");
    const img = document.createElement("img");
    const h1_inizio = document.createElement("h1");
    const h1_fine = document.createElement("h1");
    const p = document.createElement("p");
    const id = document.createElement("p");
    
    div.addEventListener('click', onModalClick); 
    id.textContent = json[i].id;
    id.classList.add("hidden");
    h1_inizio.textContent = json[i].data_inizio;
    h1_fine.textContent = json[i].data_fine;
    p.textContent = json[i].titolo;
    img.src = 'imgm/' + json[i].path + '.jpg';
    
    div.appendChild(id);
    div.appendChild(img);
    div.appendChild(h1_inizio);
    div.appendChild(h1_fine);
    div.appendChild(p);
    document.querySelector("#presentazione_eventi").appendChild(div);
  }
}
function prova(json){
    console.log(json);
    const div = document.createElement("div");
    const img = document.createElement("img");
    const h1 = document.createElement("h1");
    const p = document.createElement("p");
    const p_data_inizio = document.createElement("p");
    const p_data_fine = document.createElement("p");
    const meteo_testo= document.createElement("p");
    const meteo_img = document.createElement("img");
    const id = document.createElement("p");
    const data1 = new Date(json[0].data_inizio);
    const data2 = new Date(json[0].data_fine);
    const data_oggi = new Date();
    const differenzaGiorniFinale = Math.round((data2 - data_oggi) / (1000 * 60 * 60 * 24)); // calcola la differenza di giorni
    const differenzaGiorniIniziale = Math.round((data1 - data_oggi) / (1000 * 60 * 60 * 24)); // calcola la differenza di giorni
    let dateParts = json[0].data_inizio.split("/");
    differenzaGiorni3 = differenzaGiorniIniziale;
    if(differenzaGiorniIniziale < 0 && differenzaGiorniFinale >= 0)
      {
        dateParts = json[0].data_fine.split("/");
        differenzaGiorni3 = differenzaGiorniFinale;
      }
    console.log(differenzaGiorni3);
    const formattedDate = dateParts[2] + "/" + dateParts[0] + "/" + dateParts[1] + " 12:00:00";
    const data_confrontabile_inizio = formattedDate.replace(/\//g, "-");
    let somma = 0;
    const durata = Math.round((data2 - data1) / (1000 * 60 * 60 * 24)); // calcola la differenza di giorni
    if(differenzaGiorni3 < 5 && differenzaGiorni3 >= 0) // se non sono entro i 40 giorni non ho la temperatura
    {
      fetch('richiesta_meteo.php').then(response => response.json()).then(dati => 
          {
            for(let i = 0; i < dati.cnt; i++)
            { 
              if((dati.list[i].dt_txt === data_confrontabile_inizio) && (durata !== 0))
              {
                  for(let j = 0; j < durata; j++)
                  {
                    somma += dati.list[i+j].main.temp;
                    var wordFrequencies = {};
                    var mostRepeatedIcon = "";
                    var word = dati.list[i+j].weather[0].icon;
                    wordFrequencies[word] = (wordFrequencies[word] || 0) + 1;
                    if (wordFrequencies[word] > (wordFrequencies[mostRepeatedIcon] || 0)) 
                      mostRepeatedIcon = word;
                  
                  }             
                    let media = somma/durata;
                    media = media.toFixed(2);
                    console.log(media);
                    console.log(mostRepeatedIcon);
                    meteo_testo.textContent = "La temperatura media è di " + media + "°C";
                    meteo_img.src = "http://openweathermap.org/img/wn/" + mostRepeatedIcon + "@2x.png";
                    div.appendChild(meteo_img);
                }
            }
          
      });
    }
    else if(differenzaGiorni3 < 0){
      meteo_testo.textContent = "L'evento è già terminato";
    }
    else
    {
      meteo_testo.textContent = "Non è possibile visualizzare la temperatura perchè mancano più di 5 giorni all'evento";
    }
    const img_button = document.createElement("img");
    button_preference = document.createElement("button");
    const formData = new FormData();
    formData.append('id', json[0].id);
    fetch('richiesta_preferenza_bottone.php', {method: 'post', body: formData}).then(response => response.json()).then(dati => {
    
      if(dati.length === 0)
      {
        img_button.src = "../hw1/imgm/fi-rr-star.png";
      }
      else
      {
        img_button.src = "../hw1/imgm/fi-sr-star.png";
      }
    });
    img_button.addEventListener('click', onPreferenceClick);
    id.textContent = json[0].id;
    console.log(json[0].id);
    id.classList.add("hidden");
    h1.textContent = json[0].titolo;
    p.textContent = json[0].paragrafo;
    p_data_inizio.textContent = json[0].data_inizio;
    p_data_fine.textContent = json[0].data_fine;
    img.src = 'imgm/' + json[0].path + '.jpg';
    img.classList.add("immagine_meteo");
    button_preference.appendChild(img_button);
    
    div.appendChild(id);
    div.appendChild(img);
    div.appendChild(button_preference);
    div.appendChild(p_data_inizio);
    div.appendChild(p_data_fine);
    div.appendChild(h1);
    div.appendChild(p);
    div.appendChild(meteo_testo);
    document.querySelector("#window").appendChild(div);
}
function onModalClick(event) {
  const id = event.currentTarget.querySelector("p").textContent;
  const modal = document.querySelector('#modal-view');
  modal.classList.remove('hidden');
  const array = {"id_festa": id};
  const options = {
    method: 'POST',
    body: JSON.stringify(array),
    headers: {
      'Content-Type': 'application/json'
    }
  };
  fetch('richiesta_modale_in.php', options)
    .then(response => response.json())
      .then(array => { prova(array);})
        .catch(error => {
          console.error(error);});
  
  modal.addEventListener('click',closeModal);
}

function closeModal(event){
  console.log("Close modal");
  document.querySelector("#window").innerHTML = "";
  event.currentTarget.classList.add("hidden");
}

function onPreferenceClick(event){
  event.stopPropagation();
  const formData = new FormData();
   const card = event.currentTarget.parentNode.parentNode;
    formData.append('id', card.querySelector("p").textContent);
  if(event.currentTarget.parentNode.querySelector("img").src === "http://localhost/hw1/imgm/fi-sr-star.png")
  {
    console.log("Click su rimuovi preferenze");
    fetch('rimuovi_preferenza.php', {method: 'post', body: formData}).then(dispatchResponse, dispatchError).then(event.currentTarget.parentNode.querySelector("img").src = "http://localhost/hw1/imgm/fi-rr-star.png");
  }
  else
  {
    console.log("Click su preferenze");
    fetch('inserisci_preferenze.php', {method: 'post', body: formData}).then(dispatchResponse, dispatchError).then(event.currentTarget.parentNode.querySelector("img").src = "http://localhost/hw1/imgm/fi-sr-star.png");
  } 
}

function dispatchResponse(response) {
  console.log(response);
  return response.json().then(databaseResponse); 
}

function dispatchError(error) { 
  console.log("Errore");
}

function databaseResponse(json) {
  if (!json.ok) {
      dispatchError();
      return null;
  }
}

button.addEventListener("click", function() {
  if(flag === 0)
  {
    audio.play();
    flag = 1;
  }
  else
  {
    audio.pause();
    flag = 0;
  }
});




