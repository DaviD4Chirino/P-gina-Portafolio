var text = (`En el cielo reinan los ángeles desde hace milenios; seres provenientes de luz y protectoras de la misma. Todo está donde debe y cada ángel tiene un destino, no hay edificio más grande o más resistente que otro, no hay espacios vacíos ni caminos que no lleven a ningún lugar, no hay crimen ni policía, no hay ataúdes ni tumbas porque nadie muere, no hay gobierno porque no necesitan reglas. Todos son iguales y es por ello que han vivido tanto, solo hay un supervisor de estas criaturas: su luz, lo que los mantiene con vida, lo que les da sus alas.
Cuando una sombra se posa entre la luz y ellos es la señal de procrear, de dar vida a más ángeles para así aumentar la luz y espantar a las sombras.Cada pareja siempre da vida a un hijo y una hija.Un día, cuando una sombra apareció, Tamiel y Lumiel se juntaron pero sólo dieron vida a un niño, Arciel, no prestaron demasiada importancia puesto que podían aceptar eso, muchos creyeron que el niño sería grande para el futuro de la luz.
Los años pasaban y Arciel crecía preguntándose por que él era el único sin una hermana, cuando cumplió ocho años, en la escuela le pidieron que dibujara cómo creía él que se veía la luz, solo podían dibujar con colores claros.Nadie la había visto y sin embargo sabían que existía, se les dijo que la luz es aquello que te da vida.Todos dibujaron a sus padres, alegando que ellos viven por sus padres.Arciel no sabía que dibujar y su profesor se acercó a él preguntando el por qué su hoja está vacía.
Mis padres me dieron vida a mí - respondió Arciel.
Entonces, ¿por qué no los dibujas a ellos ? -responde el profesor.`)

var splited = text.split("\n");
var result =[]

function spliter(variable,open,close,endvar) {
    for (let i = 0; i < variable.length; i++) {
        endvar.push(`${open}${variable[i]}${close}`);
        
    }  
}
spliter(splited,"<div>","</div>",result);
var final = result.join("<br>")