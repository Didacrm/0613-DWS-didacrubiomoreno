# Miniaplicació Bloc 5

Dídac Rubio Moreno – 0613 DWS

## Què fa

Un formulari on poses nom, edat i un número de l'1 al 10. En enviar-lo et saluda, et diu si ets major d'edat, mostra la taula de multiplicar del número, fa un compte enrere fins a l'1 i mostra tres notes amb la mitjana i la qualificació. Si falta algun camp o les dades no són vàlides, surt un error en vermell.

## Com executar-la

Des de la carpeta del repositori:

```
php -S localhost:8000
```

I obrir `http://localhost:8000/exercicisphp/bloc5_miniaplicacio/index.php`.

## Què he fet servir

Formulari amb `$_POST`, validació amb `if/else` i `filter_var()`, bucles `for`, `while` i `foreach`, un array associatiu de notes i tres funcions meves: `esMajorEdat()`, `mitjana()` i `qualificacio()`.

## Exemple

Entrada: Joan, 20, 4

```
Hola Joan, tens 20 anys.
Ets major d'edat.
Taula del 4: 4 x 1 = 4 ... 4 x 10 = 40
Compte enrere: 4 3 2 1
Les notes són: Matemàtiques: 6, Català: 7.5, Anglès: 8
La mitjana de les notes és: 7.17 (Notable)
```

Si poso un 15 al número o 20.5 a l'edat, surt un error en vermell.