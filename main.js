//const app= require('electron').app
//const BrowserWindow = require('electron').BrowserWindow
const {app,BrowserWindow} = require('electron')
//ruta donde se encuentra nuestro proyecto
const path = require('path')
//ruta pero en formato URL
const url = require('url')
let PantallaPrincipal;

function muestraPantallaPrincipal(){
    PantallaPrincipal = new BrowserWindow({
    	width:320,
    	height:425
    })
    PantallaPrincipal.on('closed',function(){
    	PantallaPrincipal = null;
    })
    PantallaPrincipal.loadURL(url.format({
    	pathname: path.join(__dirname, 'index.html'),
    	protocol: 'file',
    	slashes: true
    }))
    PantallaPrincipal.webContents.openDevTools()
    PantallaPrincipal.show()
}
//la aplicacion ejecuta este evento cuando el archivo main.js se carga en memoria
app.on('ready',muestraPantallaPrincipal)

