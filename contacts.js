fetch("richiesta_contacts.php").then(response => response.json()).then(dati => {
   for(let i = 0; i < dati.length; i++) {
   if(dati[i].tipo === "cibo") 
    {
        const div_appartenenza = document.querySelector("#box_cibo");
        const div = document.createElement("div");
        const img = document.createElement("img");
        const a = document.createElement("a");
        const p = document.createElement("p");
        img.src = "../hw1/imgm/fi-rr-fork.png";
        p.textContent = dati[i].nome;
        a.href = dati[i].link;
        div.appendChild(img);
        a.appendChild(p);
        div.appendChild(a);
        div_appartenenza.appendChild(div);
    }
    else{
        const div_appartenenza = document.querySelector("#box_letto");
        const div = document.createElement("div");
        const img = document.createElement("img");
        const a = document.createElement("a");
        const p = document.createElement("p");
        img.src = "../hw1/imgm/fi-rr-bed.png";
        p.textContent = dati[i].nome;
        a.href = dati[i].link;
        div.appendChild(img);
        a.appendChild(p);
        div.appendChild(a);
        div_appartenenza.appendChild(div); 
    }
}

});