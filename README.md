# API pour les guichets de taxi brousse
- #### Ceci est un api pour les guichets de taxi brousse qui permet d'enregistrer les voitutres , les Cooperative et les passager ainsi que les trajets

- #### Il n'y pas d'authentification mais tous simplement des methode pour les insertion
> Les types de données retournées par l'API sont de types ___ld+json___
# Les end points
1. ## Coopérative
* ## GET /api/cooperatives
> Retourne la liste de tous les coopératives enregistrées dans la base de donnée.
~~~ 
    {
        "@context": "string",
        "@id": "string",
        "@type": "string",
        "id": 0,
        "nomCooperative": "string",
        "voitures": [
        "/api/voitures/1"
      ]
    }
~~~
> ___La clé voiture contient la liste des iri de toutes les voitures de la coopérative___

* ## POST /api/cooperative
> Permet d'inserer une nouvelle coopérative dans la liste

~~~
{
  "nomCooperative": "string"
}
~~~
* ## GET /api/cooperatives/{id}
> Retourne les informations sur une coopérative en utilisant son identifiant
~~~
{
  "@context": "/api/contexts/Cooperative",
  "@id": "/api/cooperatives/1",
  "@type": "Cooperative",
  "id": 1,
  "nomCooperative": "SoaTrans",
  "voitures": [
    "/api/voitures/1",
    "/api/voitures/2",
    "/api/voitures/3",
    "/api/voitures/4",
    "/api/voitures/5"
  ]
}
~~~

* ## PUT /api/cooperatives/{id}
> Permet de modifier tous les champs d'une coopérative a partir de son identifiant
~~~
{
  "nomCooperative": "Cooperative"
}
~~~

* ## DELETE /api/cooperative/{id}
> Permet de supprimer a l'aide de l'identifiant

* ## PATCH /api/cooperative/{id}
> Permet de modidifer un champs d'une cooperative

~~~
{
  "nomCooperative": "Cooperative"
}
~~~

2. ## Voitures

* ## GET /api/voitures
> Retourne une liste de tous les voitures contenue dans la base de donneée

~~~
{
  "@context": "/api/contexts/Voiture",
  "@id": "/api/voitures",
  "@type": "hydra:Collection",
  "hydra:totalItems": 23,
  "hydra:member": [
    {
      "@id": "/api/voitures/1",
      "@type": "Voiture",
      "id": 1,
      "marque": "Toyota",
      "numero": "1234 TAR",
      "nombrePlace": 17,
      "cooperative": "/api/cooperatives/1"
    },
    {
      "@id": "/api/voitures/2",
      "@type": "Voiture",
      "id": 2,
      "marque": "Toyota",
      "numero": "1235 TAB",
      "nombrePlace": 17,
      "cooperative": "/api/cooperatives/1"
    }
  ]
}
~~~

* ## POST /api/voitures
> Permet l'insertion d'une voiture dans la base de donnée
~~~
{
  "marque": "Toyota",
  "numero": "1235 TAB",
  "nombrePlace": 17,
  "cooperative": "/api/cooperatives/1"
}
~~~ 

* ## GET /api/voitures/{id}
> Permet de récuperer les informations sur une voiture

~~~
{
  "@context": "/api/contexts/Voiture",
  "@id": "/api/voitures/1",
  "@type": "Voiture",
  "id": 1,
  "marque": "Toyota",
  "numero": "1234 TAR",
  "nombrePlace": 17,
  "cooperative": "/api/cooperatives/1"
}
~~~
* ## PUT /api/voitures/{id}
> Permet de modifier tous les champes d'une voiture en même temps

~~~
{
  "marque": "Toyota",
  "numero": "1235 TAB",
  "nombrePlace": 17,
  "cooperative": "/api/cooperatives/1"
}
~~~

* ## DELETE /api/voitures/{id}
> Permet de supprimer une voiture de la liste
* ## PATCH /api/voitures/{id}
> Permet de modifier les information d'une voiture en specifiant l'identifiant
~~~
{
  "numero": "1235 TAB"
}
~~~

3. ## Trajet
* ## GET /api/trajet
> Permet de récuperer la liste de tous les trajets enregistré dans la base

~~~
{
  "@context": "/api/contexts/Trajet",
  "@id": "/api/trajets",
  "@type": "hydra:Collection",
  "hydra:totalItems": 5,
  "hydra:member": [
    {
      "@id": "/api/trajets/1",
      "@type": "Trajet",
      "id": 1,
      "depart": "Antsirabe",
      "arrive": "Antananarivo",
      "date": "2024-02-19T00:00:00+01:00",
      "clients": [
        "/api/clients/1"
      ],
      "voiture": "/api/voitures/1"
    },
    {
      "@id": "/api/trajets/2",
      "@type": "Trajet",
      "id": 2,
      "depart": "Antsirabe",
      "arrive": "Antananarivo",
      "date": "2024-02-13T00:00:00+01:00",
      "clients": [
        "/api/clients/2"
      ],
      "voiture": "/api/voitures/2"
    }
  ]
}
~~~

* ## POST /api/trajet
> Permet d'insere un nouveau trajet 

~~~
{
  "depart": "Antsirabe",
  "arrive": "Antananarivo",
  "date": "2024-02-19T12:17:56.180Z",
  "voiture": "https://example.com/"
}
~~~

* ## GET /api/trajets/{id}
> Permet de récuperer les informations sur un seul trajet

~~~
{
  "@context": "/api/contexts/Trajet",
  "@id": "/api/trajets/1",
  "@type": "Trajet",
  "id": 1,
  "depart": "Antsirabe",
  "arrive": "Antananarivo",
  "date": "2024-02-19T00:00:00+01:00",
  "clients": [
    "/api/clients/1"
  ],
  "voiture": "/api/voitures/1"
}
~~~
* ## PUT /api/trajets/{id}
> Permet de modifier tous les information sur un trajet à a partir de l'identifiant
~~~
{
  "depart": "Antsirabe",
  "arrive": "Antananarivo",
  "date": "2024-02-19T12:17:56.180Z",
  "voiture": "/api/voitures/1"
}
~~~
* ## DELETE /api/trajets/{id}
> Permet de supprimer un trajet à partir de l'identifiant

* ## PATCH /api/trajets/{id}
>Permet de modifier un seul champs sur un trajet
~~~
{
  "depart": "Antsirabe",
  "arrive": "Antananarivo",
  "date": "2024-02-19T12:17:56.180Z",
}
~~~
4. ## Clients
* ## GET /api/clients
>Permet de récuperer tous les clients dans la liste des cliens dans la base des données
~~~
{
  "@context": "/api/contexts/Client",
  "@id": "/api/clients",
  "@type": "hydra:Collection",
  "hydra:totalItems": 5,
  "hydra:member": [
    {
      "@id": "/api/clients/1",
      "@type": "Client",
      "id": 1,
      "nom": "Rafitoarisoa",
      "prenom": "Edwino",
      "telephone": "0347882925",
      "trajet": "/api/trajets/1"
    },
    {
      "@id": "/api/clients/2",
      "@type": "Client",
      "id": 2,
      "nom": "Rafitoarisoa",
      "prenom": "Edwino",
      "telephone": "0347882925",
      "trajet": "/api/trajets/2"
    }
  ]
}
~~~

* ## POST /api/clients
> Permet d'inserer un nouveau client
~~~
{
  "nom": "RAFITOARISOA",
  "prenom": "Edwino",
  "telephone": "0347882925",
  "trajet": "/api/trajets/1"
}
~~~
* ## GET /api/clients/{id}
> Permet les informations sur une seul client 
~~~
{
  "@context": "/api/contexts/Trajet",
  "@id": "/api/trajets/1",
  "@type": "Trajet",
  "id": 1,
  "depart": "Antsirabe",
  "arrive": "Antananarivo",
  "date": "2024-02-19T00:00:00+01:00",
  "clients": [
    "/api/clients/1"
  ],
  "voiture": "/api/voitures/1"
}
~~~
* ## PUT /api/clients/{id}
~~~
{
  "depart": "Antsirabe",
  "arrive": "Antananarivo",
  "date": "2024-02-19T00:00:00+01:00",
  "voiture": "/api/voitures/1"
}
~~~
* ## DELETE /api/clients/{id}
> Permet de supprimer un client à partir de son identifiant

* ## PATCH /api/cleints/{id}
> Permet de modifier une ou plusieurs champs sur l'information d'un client
~~~
{
  "depart": "Antsirabe"
}
~~~
 
