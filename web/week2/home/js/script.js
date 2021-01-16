const requestURL = 'https://ramalaso.github.io/ramalaso/employee.json';

fetch(requestURL)
.then((response) => response.json())
.then((jsObject) => {
  console.log(jsObject); 

  jsObject.Employees.forEach(employee => {

    console.log(employee);
          
            let article = document.createElement('article');
            article.classList.add('card');
            let img = document.createElement('img');
            img.src = "img/profile.jpg";
            article.appendChild(img);
            let h1 = document.createElement('h1');
            h1.textContent = employee.firstName + " " + employee.lastName;
            article.appendChild(h1);
            let p = document.createElement('p');
            p.innerHTML = `<b>Country: </b> ${employee.country}`;
            article.appendChild(p);
            p = document.createElement('p');
            p.innerHTML = `<b>Class: </b> ${employee.class}`;
            article.appendChild(p);
            p = document.createElement('p');
            p.innerHTML = `<b>Email: </b> ${employee.emailAddress}`;
            article.appendChild(p);
            p = document.createElement('p');
            p.innerHTML = `<b>userId: </b> ${employee.userId}`;
            article.appendChild(p);
               
            document.querySelector('div.personal-container').appendChild(article); 
  });
});

