xhr = new XMLHttpRequest();
xhr.open("GET" , "https://user.traxia.com/app/api/inventory" , false);
xhr.send();

console.log(xhr.status);
console.log(xhr.statusText);