<?php
 // POST
 @OptIn(InternalAPI::class)
function createUser(String $nom, String $prenom, Int $age) : Pair<Boolean, String> {
     val response = httpClient
         .post(api.url + "api/user") {
             headers {
                 append(HttpHeaders.ContentType, "application/json")
             }
             body = """
               {
                 "nom" : "$nom", 
                 "prenom": "$prenom",
                 "age": "$age",
                 
               }""".trimIndent()
         }

     val message = Api.getMessage(response)
     return Pair(response.status.isSuccess(), message)
 }
?>