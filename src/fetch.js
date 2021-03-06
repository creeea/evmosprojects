async function get_data(){
    let version = (new Date()).getTime();  
    const respone = await fetch("src/projects.json?version=1"+version)
    const projects = await respone.json()
    const test = await projects
    return projects 
    
}

async function create_cards(data, click_var){
    var row = document.querySelector(".row")
    row.innerHTML = ''
    
    var project_counter_html = document.querySelector(".lead.text-center")    
    var project_counter = 0;

        for (const property in data) {
            console.log(click_var)
            console.log(property)
            let title = JSON.stringify(data[property]['title'].replace(/['"]+/g, ''));
            title = title.replace(/['"]+/g, '')
            let category = JSON.stringify(data[property]['category']);
            category = category.replace(/['"]+/g, '')
            let content = JSON.stringify(data[property]['content']);
            content = content.replace(/['"]+/g, '')
            let telegram = JSON.stringify(data[property]['telegram']);
            telegram = telegram.replace(/['"]+/g, '')
            let twitter = JSON.stringify(data[property]['twitter']);
            twitter = twitter.replace(/['"]+/g, '')
            let website = JSON.stringify(data[property]['website']);
            website = website.replace(/['"]+/g, '')

            let airdrop = JSON.stringify(data[property]['airdrop']);
            try{
            airdrop = airdrop.replace(/['"]+/g, '')
            }
            catch(e) {
            airdrop = "no"  
            }

            switch (click_var) {
                case 'all':
                  break;
                case 'dapp':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }
                case 'defi':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }
                case 'nft':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }
                case 'protocol':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }
                case 'tools':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }   
                case 'wallet':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }
                case 'cex':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }
                case 'incentives':
                    if(click_var==category){
                        break;
                    }
                    else{
                        continue
                    }
                default:
                  continue
              }
        
        var project_card = `
        <div class="col-md-4" style="padding-top: 2.5%">
        <div class="card text-white bg-dark mb-4 box-shadow shadow-sm h-100" style="border-color: dark">
            <div class="card-header" style="background-color: #272c30;">
            <img src="img/${property}.jpg" width="10%" align="right" style="margin:5px">
            <h5 id="title" class="card-title" align="center" style="margin:5px;">${title}</h5>
            </div>
            
            <div class="card-body ">
            <p class="card-text">${content}</p>
            </div>  
         
            <div class="card-footer text-center" style="background-color: #272c30;">
            <small class="text float-left" align="left" style="font-size: 16px; color: #249bde">${category}</small>
            
            `
            console.log("airdrop: " + airdrop)
            if (airdrop != "no"){

                if (airdrop.includes("https://")){
                    project_card += `<a href="${airdrop}" target="_blank" class="badge badge-secondary">airdrop </a>`

                }

                else {

                    project_card += `<a class="badge badge-secondary">airdrop </a>`

                }

                


            }
            project_card += `<small class="text float-right" align="right">`
            console.log("website is" + website)
            if (website != ""){
                console.log("website  empty")
                project_card += ` <a type="button" class="fa fa-globe fa-2x pr-1" style="color: #777b7e" href='${website}' target="_blank"></a>`

            }

            if (telegram != "") {
                project_card += `<a type="button" class="fa fa-telegram fa-2x pr-1" style="color: #777b7e" href='${telegram}' target="_blank"></a>`
            }

            if (twitter != "") {
                project_card += `<a type="button" class="fa fa-twitter fa-2x pr-1" style="color: #777b7e" href='${twitter}' target="_blank"></a>`
            }


           
            project_card += `
            
            </small>
       
            </div>
        </div>
        </div>
        `
        row.innerHTML += project_card

        project_counter += 1;
        project_counter_html.innerText=`${click_var} cards: ${project_counter}`

}

}

function click_var (click_var){
    get_data().then(data => {
        create_cards(data, click_var)
    })
}

get_data().then(data => {
    create_cards(data, "all")
})




