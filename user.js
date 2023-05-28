function riempi_preferiti(){
    fetch('richiesta_preferenza.php').then(response => response.json()).then(dati => {
      div = document.querySelector("#box_grande");
      div.classList.add("preferiti");
      console.log(dati);
      for(let i = 0; i < dati.length; i++)
        {
          div2 = document.createElement("div");
          id = document.createElement("p");
          id.classList.add("hidden");
          div2.classList.add("box_piccolo");
          rimuovi = document.createElement("p");
          rimuovi.textContent = "x";
          rimuovi.classList.add("rimuovi");
          rimuovi.addEventListener("click", rimuovi_preferenza);
          titolo = document.createElement("h1");
          foto = document.createElement("img");
          titolo.textContent = dati[i].titolo;
          foto.src = "imgm/" + dati[i].path + ".jpg";
          id.textContent = dati[i].id;
          div2.appendChild(id);
          div2.appendChild(rimuovi);
          div2.appendChild(titolo);
          div2.appendChild(foto);
          div.appendChild(div2);
        }
  });
  }

  function rimuovi_preferenza(event){
    const id = event.currentTarget.parentNode.querySelector(".hidden").textContent;
    const formData = new FormData();
    formData.append('id', id);
    fetch('rimuovi_preferenza.php', {method: 'post', body: formData}).then(response => response.json()).then(dati => {
      console.log(dati);
      div = document.querySelector("#box_grande");
      div.innerHTML = "";
      riempi_preferiti();
    });
  }
  
  const testo = document.querySelector("#keyword");
  testo.addEventListener("keyup", function(event){
    if(event.keyCode === 13)
      {
        ricerca_festa(event);
      }
  });

  function ricerca_festa(event){
    console.log(event.currentTarget.parentNode.querySelector("input").value);
    const titolo = event.currentTarget.parentNode.querySelector("input").value;
      const formData = new FormData();
      formData.append('titolo', titolo);
      fetch('ricerca_festa.php', {method: 'post', body: formData}).then(response => response.json()).then(dati => {
        if(dati.ok)
          {
              div_piccoli = document.querySelectorAll(".box_piccolo");
              for(let i = 0; i < div_piccoli.length; i++)
                {
                    if(div_piccoli[i].querySelector("h1").textContent === titolo)
                      {
                        div_piccoli[i].classList.add("ricercato");
                        setTimeout(function(){div_piccoli[i].classList.remove("ricercato");}, 3000);
                        div_piccoli[i].scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
                      } 
                }              
          }
        else
          {
            alert("Festa non trovata");
          }
      });
  }

  const bottone = document.querySelector("#ricerca");
  bottone.addEventListener("click", ricerca_festa);
  riempi_preferiti();