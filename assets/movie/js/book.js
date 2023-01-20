const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const movieSelect = document.getElementById('movie');
const totalSeats = document.querySelector(".count");
const price = document.querySelector(".totalRsss");

populateUI();

let ticketPrice = +movieSelect.value;



//save selected movie index and price
function setMovieData(movieIndex,moviePrice){
    // localStorage.setItem('selectedMovieIndex',movieIndex);
    // localStorage.setItem('selectedMoviePrice',moviePrice);
}

//Update total and count

function updateSelectedCount(){
    const selectedSeats = document.querySelectorAll('.row .seat.selected');
    const seatsIndex = [...selectedSeats].map(function(seat){
        return [...seats].indexOf(seat);
    })


    // localStorage.setItem('selectedSeats',JSON.stringify(seatsIndex));
    const selectedSeatsCount = selectedSeats.length;

    totalSeats.value = selectedSeatsCount;
    count.innerText = selectedSeatsCount;
    total.innerText = selectedSeatsCount * ticketPrice ;
    price.value = selectedSeatsCount * ticketPrice ;

}

//get data from localstorage and populate the ui
function populateUI(){
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'))
    if(selectedSeats !== null && selectedSeats.length > 0){
        seats.forEach((seat , index) => {
            if(selectedSeats.indexOf(index) > -1 ){
                seat.classList.add('selected')
            }
        });
    }

    const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');
    if(selectedMovieIndex != null){
        movieSelect.selectedIndex = selectedMovieIndex
    }
}

//movie select event 
movieSelect.addEventListener('change' , e =>{
    ticketPrice = +e.target.value;
    setMovieData(e.target.selectedIndex , e.target.value);
    updateSelectedCount();
})    



container.addEventListener('click',(e) => {
    textarea = document.getElementsByClassName("mySeats");
    if(e.target.classList.contains('seat') && !e.target.classList.contains('occupied')){
        e.target.classList.toggle('selected');
        if (e.target.classList.contains('selected')){
            seatName = e.target.classList[0];
            textarea[0].value +=seatName+" ; ";
        } else {
            seatName = String(e.target.classList[0]);
            texxt = String(textarea[0].value);
            repl = texxt.replace(seatName+" ; ","");
            textarea[0].value = ""
            textarea[0].value += repl
        }
    }

    updateSelectedCount();

});

updateSelectedCount();