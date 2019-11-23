import '../css/app.css';
import $ from 'jquery';
import "popper.js";
import 'bootstrap';
import React from 'react';
import ReactDOM from 'react-dom'; 
import Items from '../Components/items';
/*
<link href="design.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
   
    skipSetup: true,
    players: ["swf"]
});

window.onload = function(){

    // au chargement de la page
    Shadowbox.open({
        content:    'animations/sirap.swf',
        player:     "swf",
        title:      "",
        height:     190,
        width:      600,
    });

};
</script>

*/
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
$(document).ready(function(){
    $("iframe").attr("height", "90%");
    $("iframe").attr("width", "100%");
});

 class App extends React.Component {
     constructor() {
         super();
 
         this.state = {
             entries: []
         };
     }
 
     componentDidMount() {
         fetch('https://jsonplaceholder.typicode.com/posts/')
             .then(response => response.json())
             .then(entries => {
                 this.setState({
                     entries
                 });
             });
     }
 
     render() {
         return (
             <div className="row">
                 {this.state.entries.map(
                     ({ id, title, body }) => (
                         <Items
                             key={id}
                             title={title}
                             body={body}
                         >
                         </Items>
                     )
                 )}
             </div>
         );
     }
 }
 
 ReactDOM.render(<App />, document.getElementById('root'));

 // document.getElementById('ip').style.backgroundColor="white";


