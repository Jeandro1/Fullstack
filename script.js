var urlLogin = "login.php";
var prijs;

var personenSlaapkamers;
var voorzieningen;
var text1 = "Inclusief belasting en toeslagen";
var text2 = "- Gratis wifi" + "<br>" + "<br>" + "- Airconditioning" + "<br>" + "<br>";

let bungalow1 = ["Garnaal 1A", "Garnaal 3A", "Garnaal 5A",
    "Garnaal 1B", "Garnaal 3B", "Garnaal 5B",
    "Garnaal 1C", "Garnaal 3C", "Garnaal 5C",
    "Garnaal 1D", "Garnaal 3D", "Garnaal 5D",
    "Krab 1A", "Krab 3A", "Krab 5A",
    "Krab 1B", "Krab 3B", "Krab 5B",
    "Krab 1C", "Krab 3C", "Krab 5C",
    "Krab 1D", "Krab 3D", "Krab 5D",
    "Kreeft 1A", "Kreeft 3A", "Kreeft 5A",
    "Kreeft 1B", "Kreeft 3B", "Kreeft 5B",
    "Kreeft 1C", "Kreeft 3C", "Kreeft 5C",
    "Kreeft 1D", "Kreeft 3D", "Kreeft 5D",
    "Kreeft Deluxe 1A", "Kreeft Deluxe 3A", "Kreeft Deluxe 5A"];

let bungalow2 = ["Garnaal 2A", "Garnaal 4A", "Garnaal 6A",
    "Garnaal 2B", "Garnaal 4B", "Garnaal 6B",
    "Garnaal 2C", "Garnaal 4C", "Garnaal 6C",
    "Garnaal 2D", "Garnaal 4D", "Garnaal 6D",
    "Krab 2A", "Krab 4A", "Krab 6A",
    "Krab 2B", "Krab 4B", "Krab 6B",
    "Krab 2C", "Krab 4C", "Krab 6C",
    "Krab 2D", "Krab 4D", "Krab 6D",
    "Kreeft 2A", "Kreeft 4A", "Kreeft 6A",
    "Kreeft 2B", "Kreeft 4B", "Kreeft 6B",
    "Kreeft 2C", "Kreeft 4C", "Kreeft 6C",
    "Kreeft 2D", "Kreeft 4D", "Kreeft 6D",
    "Kreeft Deluxe 2A", "Kreeft Deluxe 4A", "Kreeft Deluxe 6A"];

function filter1() {
    document.getElementById("filter2").style.display = "none";
    document.getElementById("filterbutton1").style.display = "none";

    if (document.getElementById("personen4").checked == true) {
        filter2();
    }

    if (document.getElementById("personen6").checked == true) {
        document.getElementById("slaapkamers3").checked = true;
        filter2();
    }

    if (document.getElementById("personen8").checked == true) {
        document.getElementById("filter3").style.display = "block";
        document.getElementById("filterbutton2").style.display = "block";
    }
}

//-----automatisch elementen maken en filteren-----------------------------------------------------------------------------------------------------------------------

function filter2() {

    document.getElementById("filterelement").style.display = "none";

    document.body.scrollTop = document.documentElement.scrollTop = 300;

    p4 = document.getElementById("personen4").checked;
    p6 = document.getElementById("personen6").checked;
    p8 = document.getElementById("personen8").checked;
    s3 = document.getElementById("slaapkamers3").checked;
    s4 = document.getElementById("slaapkamers4").checked;

    for (let i = 0; i < bungalow1.length; i++) {
        switch (true) {
            case bungalow1[i].includes("Garnaal"):
                personenSlaapkamers = "4 Personen - 2 Slaapkamers ";
                prijs = 89.99;
                var garnaal = document.createElement("IMG");
                garnaal.setAttribute("src", "garnaal.png");
                garnaal.style.borderRadius = "30px 30px 0px 0px";
                garnaal.style.width = "600px";
                document.getElementById("main1").appendChild(garnaal);
                break;
            case bungalow1[i].includes("Krab"):
                personenSlaapkamers = "6 Personen - 3 Slaapkamers ";
                prijs = 109.99;
                var krab = document.createElement("IMG");
                krab.setAttribute("src", "krab.png");
                krab.style.borderRadius = "30px 30px 0px 0px";
                krab.style.width = "600px";
                document.getElementById("main1").appendChild(krab);
                break;
            case bungalow1[i].includes("Kreeft Deluxe"):
                personenSlaapkamers = "8 Personen - 4 Slaapkamers ";
                prijs = 149.99;
                var kreeftDeluxe = document.createElement("IMG");
                kreeftDeluxe.setAttribute("src", "kreeftDeluxe.png");
                kreeftDeluxe.style.borderRadius = "30px 30px 0px 0px";
                kreeftDeluxe.style.width = "600px";
                document.getElementById("main1").appendChild(kreeftDeluxe);
                break;
            default:
                personenSlaapkamers = "8 Personen - 3 Slaapkamers ";
                prijs = 129.99;
                var kreeft = document.createElement("IMG");
                kreeft.setAttribute("src", "kreeft.png");
                kreeft.style.borderRadius = "30px 30px 0px 0px";
                kreeft.style.width = "600px";
                document.getElementById("main1").appendChild(kreeft);
                break;
        }

        if (bungalow1[i].includes("A")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2;
        }
        if (bungalow1[i].includes("B")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2 + "- Vaatwasser";
            prijs = prijs + 10;
        }
        if (bungalow1[i].includes("C")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2 + "- Vaatwasser" + "<br>" + "<br>" + "- Bubbelbad";
            prijs = prijs + 20;
        }
        if (bungalow1[i].includes("D")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2 + "- Vaatwasser" + "<br>" + "<br>" + "- Bubbelbad" + "<br>" + "<br>" + "- Zwembad";
            prijs = prijs + 30;
        }

        //-----elementen in html plaatsen----------------------------------------------------------------------------------------------------------------------------------

        var bungalowPrijs1 = document.createElement("div");
        document.getElementById("main1").appendChild(bungalowPrijs1);
        bungalowPrijs1.innerHTML = prijs + "<br>";

        var bungalowText1 = document.createElement("div2");
        document.getElementById("main1").appendChild(bungalowText1);
        bungalowText1.innerHTML = text1 + "<br>" + "<br>";

        var bungalowNaam1 = document.createElement("div3");
        document.getElementById("main1").appendChild(bungalowNaam1);
        bungalowNaam1.innerHTML = bungalow1[i] + "<br>" + "<br>";

        var bungalowPersonenSlaapkamers1 = document.createElement("div4");
        document.getElementById("main1").appendChild(bungalowPersonenSlaapkamers1);
        bungalowPersonenSlaapkamers1.innerHTML = personenSlaapkamers + "<br>" + "<br>";

        var bungalowVoorzieningen1 = document.createElement("div5");
        document.getElementById("main1").appendChild(bungalowVoorzieningen1);
        bungalowVoorzieningen1.innerHTML = voorzieningen + "<br>" + "<br>" + "<br>";

        var btn1 = document.createElement("BUTTON");

        btn1.addEventListener('click', () => {
            location.assign(urlLogin);
        });

        document.getElementById("main1").appendChild(btn1);
        btn1.innerHTML = "Reserveer nu " + bungalow1[i];


        //-----personen en slaapkamers filteren-------------------------------------------------------------------------------------------------------------------------------------------  

        if (bungalow1[i].includes("Garnaal") && p4 == false) {
            bungalowPrijs1.style.display = "none";
            bungalowText1.style.display = "none";
            bungalowNaam1.style.display = "none";
            bungalowPersonenSlaapkamers1.style.display = "none";
            bungalowVoorzieningen1.style.display = "none";
            btn1.style.display = "none";
            garnaal.style.display = "none";
        }

        if (bungalow1[i].includes("Krab") && p6 == false) {
            bungalowPrijs1.style.display = "none";
            bungalowText1.style.display = "none";
            bungalowNaam1.style.display = "none";
            bungalowPersonenSlaapkamers1.style.display = "none";
            bungalowVoorzieningen1.style.display = "none";
            btn1.style.display = "none";
            krab.style.display = "none";
        }

        if (bungalow1[i].includes("Kreeft") && !bungalow1[i].includes("Deluxe") && (p8 == false || s4 == true)) {
            bungalowPrijs1.style.display = "none";
            bungalowText1.style.display = "none";
            bungalowNaam1.style.display = "none";
            bungalowPersonenSlaapkamers1.style.display = "none";
            bungalowVoorzieningen1.style.display = "none";
            btn1.style.display = "none";
            kreeft.style.display = "none";
        }

        if (bungalow1[i].includes("Deluxe") && (p8 == false || s3 == true)) {
            bungalowPrijs1.style.display = "none";
            bungalowText1.style.display = "none";
            bungalowNaam1.style.display = "none";
            bungalowPersonenSlaapkamers1.style.display = "none";
            bungalowVoorzieningen1.style.display = "none";
            btn1.style.display = "none";
            kreeftDeluxe.style.display = "none";
        }

        //-----elementen stylen-------------------------------------------------------------------------------------------------------------------------------------------  

        //Prijs  
        bungalowPrijs1.style.color = "black";
        bungalowPrijs1.style.fontWeight = "bold";
        bungalowPrijs1.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowPrijs1.style.fontSize = "15px";
        bungalowPrijs1.style.textAlign = "right";
        bungalowPrijs1.style.backgroundColor = "white";
        bungalowPrijs1.style.width = "97%";
        bungalowPrijs1.style.paddingRight = "3%";
        bungalowPrijs1.style.paddingTop = "2%";

        //Text1 
        bungalowText1.style.color = "darkgrey";
        bungalowText1.style.fontWeight = "bold";
        bungalowText1.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowText1.style.fontSize = "10px";
        bungalowText1.style.textAlign = "right";
        bungalowText1.style.backgroundColor = "white";
        bungalowText1.style.width = "97%";
        bungalowText1.style.paddingRight = "3%";
        bungalowText1.style.paddingTop = "2%";

        //Naam
        bungalowNaam1.style.color = "black";
        bungalowNaam1.style.fontWeight = "bold";
        bungalowNaam1.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowNaam1.style.fontSize = "15px";
        bungalowNaam1.style.backgroundColor = "white";
        bungalowNaam1.style.paddingLeft = "3%";
        bungalowNaam1.style.paddingTop = "2%";


        //PersonenSlaapkamers
        bungalowPersonenSlaapkamers1.style.color = "grey";
        bungalowPersonenSlaapkamers1.style.fontWeight = "bold";
        bungalowPersonenSlaapkamers1.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowPersonenSlaapkamers1.style.fontSize = "10px";
        bungalowPersonenSlaapkamers1.style.backgroundColor = "white";
        bungalowPersonenSlaapkamers1.style.paddingLeft = "3%";
        bungalowPersonenSlaapkamers1.style.paddingTop = "2%";


        //Voorzieningen
        bungalowVoorzieningen1.style.color = "grey";
        bungalowVoorzieningen1.style.fontWeight = "bold";
        bungalowVoorzieningen1.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowVoorzieningen1.style.fontSize = "10px";
        bungalowVoorzieningen1.style.backgroundColor = "white";
        bungalowVoorzieningen1.style.paddingLeft = "3%";
        bungalowVoorzieningen1.style.paddingTop = "2%";

        //Knop
        btn1.style.color = "white";
        btn1.style.fontWeight = "bold";
        btn1.style.textAlign = "center";
        btn1.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        btn1.style.fontSize = "15px";
        btn1.style.backgroundColor = "cornflowerblue";
        btn1.style.width = "100%";
        btn1.style.padding = "10px";
        btn1.style.border = "none";
        btn1.style.marginBottom = "20%";
        btn1.style.borderRadius = "0px 0px 30px 30px";



    }


    //-----Tweede rij-------------------------------------------------------------------------------------------------------------------------------------------  


    for (let i = 0; i < bungalow2.length; i++) {

        switch (true) {
            case bungalow2[i].includes("Garnaal"):
                personenSlaapkamers = "4 Personen - 2 Slaapkamers ";
                prijs = 89.99;
                var garnaal = document.createElement("IMG");
                garnaal.setAttribute("src", "garnaal.png");
                garnaal.style.borderRadius = "30px 30px 0px 0px";
                garnaal.style.width = "600px";
                document.getElementById("main2").appendChild(garnaal);
                break;
            case bungalow2[i].includes("Krab"):
                personenSlaapkamers = "6 Personen - 3 Slaapkamers ";
                prijs = 109.99;
                var krab = document.createElement("IMG");
                krab.setAttribute("src", "krab.png");
                krab.style.borderRadius = "30px 30px 0px 0px";
                krab.style.width = "600px";
                document.getElementById("main2").appendChild(krab);
                break;
            case bungalow2[i].includes("Kreeft Deluxe"):
                personenSlaapkamers = "8 Personen - 4 Slaapkamers ";
                prijs = 149.99;
                var kreeftDeluxe = document.createElement("IMG");
                kreeftDeluxe.setAttribute("src", "kreeftDeluxe.png");
                kreeftDeluxe.style.borderRadius = "30px 30px 0px 0px";
                kreeftDeluxe.style.width = "600px";
                document.getElementById("main2").appendChild(kreeftDeluxe);
                break;
            default:
                personenSlaapkamers = "8 Personen - 3 Slaapkamers ";
                prijs = 129.99;
                var kreeft = document.createElement("IMG");
                kreeft.setAttribute("src", "kreeft.png");
                kreeft.style.borderRadius = "30px 30px 0px 0px";
                kreeft.style.width = "600px";
                document.getElementById("main2").appendChild(kreeft);
                break;
        }

        if (bungalow2[i].includes("A")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2;
        }
        if (bungalow2[i].includes("B")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2 + "- Vaatwasser";
            prijs = prijs + 10;
        }
        if (bungalow2[i].includes("C")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2 + "- Vaatwasser" + "<br>" + "<br>" + "- Bubbelbad";
            prijs = prijs + 20;
        }
        if (bungalow2[i].includes("D")) {
            voorzieningen = "Voorzieningen:" + "<br>" + "<br>" + text2 + "- Vaatwasser" + "<br>" + "<br>" + "- Bubbelbad" + "<br>" + "<br>" + "- Zwembad";
            prijs = prijs + 30;
        }

        //-----elementen in html plaatsen----------------------------------------------------------------------------------------------------------------------------------

        var bungalowPrijs2 = document.createElement("div");
        document.getElementById("main2").appendChild(bungalowPrijs2);
        bungalowPrijs2.innerHTML = prijs + "<br>";

        var bungalowText2 = document.createElement("div2");
        document.getElementById("main2").appendChild(bungalowText2);
        bungalowText2.innerHTML = text1 + "<br>" + "<br>";

        var bungalowNaam2 = document.createElement("div3");
        document.getElementById("main2").appendChild(bungalowNaam2);
        bungalowNaam2.innerHTML = bungalow2[i] + "<br>" + "<br>";

        var bungalowPersonenSlaapkamers2 = document.createElement("div4");
        document.getElementById("main2").appendChild(bungalowPersonenSlaapkamers2);
        bungalowPersonenSlaapkamers2.innerHTML = personenSlaapkamers + "<br>" + "<br>";

        var bungalowVoorzieningen2 = document.createElement("div5");
        document.getElementById("main2").appendChild(bungalowVoorzieningen2);
        bungalowVoorzieningen2.innerHTML = voorzieningen + "<br>" + "<br>" + "<br>";

        var btn2 = document.createElement("BUTTON");

        btn2.addEventListener('click', () => {
            location.assign(urlLogin);
        });

        document.getElementById("main2").appendChild(btn2);
        btn2.innerHTML = "Reserveer nu " + bungalow2[i];

        //-----personen en slaapkamers filteren-------------------------------------------------------------------------------------------------------------------------------------------  

        if (bungalow2[i].includes("Garnaal") && p4 == false) {
            bungalowPrijs2.style.display = "none";
            bungalowText2.style.display = "none";
            bungalowNaam2.style.display = "none";
            bungalowPersonenSlaapkamers2.style.display = "none";
            bungalowVoorzieningen2.style.display = "none";
            btn2.style.display = "none";
            garnaal.style.display = "none";
        }

        if (bungalow2[i].includes("Krab") && p6 == false) {
            bungalowPrijs2.style.display = "none";
            bungalowText2.style.display = "none";
            bungalowNaam2.style.display = "none";
            bungalowPersonenSlaapkamers2.style.display = "none";
            bungalowVoorzieningen2.style.display = "none";
            btn2.style.display = "none";
            krab.style.display = "none";
        }

        if (bungalow2[i].includes("Kreeft") && !bungalow2[i].includes("Deluxe") && (p8 == false || s4 == true)) {
            bungalowPrijs2.style.display = "none";
            bungalowText2.style.display = "none";
            bungalowNaam2.style.display = "none";
            bungalowPersonenSlaapkamers2.style.display = "none";
            bungalowVoorzieningen2.style.display = "none";
            btn2.style.display = "none";
            kreeft.style.display = "none";
        }

        if (bungalow2[i].includes("Deluxe") && (p8 == false || s3 == true)) {
            bungalowPrijs2.style.display = "none";
            bungalowText2.style.display = "none";
            bungalowNaam2.style.display = "none";
            bungalowPersonenSlaapkamers2.style.display = "none";
            bungalowVoorzieningen2.style.display = "none";
            btn2.style.display = "none";
            kreeftDeluxe.style.display = "none";
        }

        //-----elementen stylen-------------------------------------------------------------------------------------------------------------------------------------------  

        //Prijs  
        bungalowPrijs2.style.color = "black";
        bungalowPrijs2.style.fontWeight = "bold";
        bungalowPrijs2.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowPrijs2.style.fontSize = "15px";
        bungalowPrijs2.style.textAlign = "right";
        bungalowPrijs2.style.backgroundColor = "white";
        bungalowPrijs2.style.width = "97%";
        bungalowPrijs2.style.paddingRight = "3%";
        bungalowPrijs2.style.paddingTop = "2%";

        //Text2 
        bungalowText2.style.color = "darkgrey";
        bungalowText2.style.fontWeight = "bold";
        bungalowText2.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowText2.style.fontSize = "10px";
        bungalowText2.style.textAlign = "right";
        bungalowText2.style.backgroundColor = "white";
        bungalowText2.style.width = "97%";
        bungalowText2.style.paddingRight = "3%";
        bungalowText2.style.paddingTop = "2%";

        //Naam
        bungalowNaam2.style.color = "black";
        bungalowNaam2.style.fontWeight = "bold";
        bungalowNaam2.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowNaam2.style.fontSize = "15px";
        bungalowNaam2.style.backgroundColor = "white";
        bungalowNaam2.style.paddingLeft = "3%";
        bungalowNaam2.style.paddingTop = "2%";


        //PersonenSlaapkamers
        bungalowPersonenSlaapkamers2.style.color = "grey";
        bungalowPersonenSlaapkamers2.style.fontWeight = "bold";
        bungalowPersonenSlaapkamers2.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowPersonenSlaapkamers2.style.fontSize = "10px";
        bungalowPersonenSlaapkamers2.style.backgroundColor = "white";
        bungalowPersonenSlaapkamers2.style.paddingLeft = "3%";
        bungalowPersonenSlaapkamers2.style.paddingTop = "2%";


        //Voorzieningen
        bungalowVoorzieningen2.style.color = "grey";
        bungalowVoorzieningen2.style.fontWeight = "bold";
        bungalowVoorzieningen2.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        bungalowVoorzieningen2.style.fontSize = "10px";
        bungalowVoorzieningen2.style.backgroundColor = "white";
        bungalowVoorzieningen2.style.paddingLeft = "3%";
        bungalowVoorzieningen2.style.paddingTop = "2%";

        //Knop
        btn2.style.color = "white";
        btn2.style.fontWeight = "bold";
        btn2.style.textAlign = "center";
        btn2.style.fontFamily = "apercu, -apple-system, system, sans-serif";
        btn2.style.fontSize = "15px";
        btn2.style.backgroundColor = "cornflowerblue";
        btn2.style.width = "100%";
        btn2.style.padding = "10px";
        btn2.style.border = "none";
        btn2.style.marginBottom = "20%";
        btn2.style.borderRadius = "0px 0px 30px 30px";

    }


    //-----filter weghalen------------------------------------------------------------------------------------------------------------------------------------------- 



}