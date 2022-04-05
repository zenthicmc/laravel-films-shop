function search() {
   let searchInput = $('.search-input').val();

   if(searchInput == '') {
      alert('Please enter a search title');
   }
   else {
      window.location.href = '/search/' + searchInput;
   }
}