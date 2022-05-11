# Trabajos para Programacion Web Avanzada

En este Repo encontraras los primeros trabajos de la materia, mas una carpeta `equipo-rojo-front` con el Front de la Landing Page del equipo Rojo del curso. 

## Instalacion

Descargar [Docker](https://www.docker.com/products/docker-desktop/) para tener el ambiente optimo para el proyecto.

*En windows __NO__ configurar WSL, es innecesario para este proyecto y genera confusiones/errores en usuarios menos avanzados 😮‍💨*

## Como Levantar el Proyecto

La configuracion e instalacion de dependencias se realiza automaticamente con este comando, y los servidores quedan levantados una vez finalizado el proceso
```bash
# este comando va ser lento unicamente la primera vez que se corra, ya que tiene que descargar muchos datos
docker-compose up -d
```

Una vez completado el proceso anterior, podras dirigirte a:
 - Front: `http://localhost:8001/`
 - Front general del equipo: `http://localhost:8001/equipo-rojo-front/`
 - PhpMyAdmin `http://localhost:8000/`

## Finalmente
 ✨[hav fUn >:)](https://choosealicense.com/licenses/mit/)✨
