<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/styles.css">
    <title>Document</title>
</head>
<body>
    <div id="wrapper">
        <div id="title">
          <h1>Documentação de teste</h1>
          <h2>para ser testado via Postman ou insnomnia</h2>
        </div>
      
        <a href="#resumo" class="collapse-title">Resumo</a>
        <div id="resumo" class="collapse">
            Este projeto consiste em um sistema de hotelaria desenvolvido em Laravel, um framework PHP. A estrutura do banco de dados inclui tabelas para Quartos, Reservas e Clientes, com relacionamentos adequados entre elas. O projeto foi desenvolvido com ênfase em boas práticas de programação, MVC, documentação e performance.
        </div>
      
        <a href="#endpoints" class="collapse-title">Endpoints</a>
        <div id="endpoints" class="collapse">
            <div class="swagger-ui">
                <div style="height: auto; border: none; margin: 0px; padding: 0px;">
                  <div class="opblock opblock-get" id="operations-default-get_accounts">
                    <div class="opblock-summary opblock-summary-get"><span class="opblock-summary-method">GET</span><span class="opblock-summary-path"><a class="nostyle" href="#/operations/default/get_accounts"><span>/accounts</span></a>
                      </span>
                      <div class="opblock-summary-description">Fetches a list of Accounts.</div><button class="authorization__btn unlocked" aria-label="authorization button unlocked"><svg width="20" height="20"><use href="#unlocked" xlink:href="#unlocked"></use></svg></button></div><noscript></noscript></div>
                  <div class="opblock opblock-post" id="operations-default-post_account">
                    <div class="opblock-summary opblock-summary-post"><span class="opblock-summary-method">POST</span><span class="opblock-summary-path"><a class="nostyle" href="#/operations/default/post_account"><span>/accounts</span></a>
                      </span>
                      <div class="opblock-summary-description">Saves a new account.</div><button class="authorization__btn unlocked" aria-label="authorization button unlocked"><svg width="20" height="20"><use href="#unlocked" xlink:href="#unlocked"></use></svg></button></div><noscript></noscript></div>
                  <div class="opblock opblock-put" id="operations-default-update_account_by_id">
                    <div class="opblock-summary opblock-summary-put"><span class="opblock-summary-method">PUT</span><span class="opblock-summary-path"><a class="nostyle" href="#/operations/default/update_account_by_id"><span>/accounts/{id}</span></a>
                      </span>
                      <div class="opblock-summary-description">Updates an existing Account by ID.</div><button class="authorization__btn unlocked" aria-label="authorization button unlocked"><svg width="20" height="20"><use href="#unlocked" xlink:href="#unlocked"></use></svg></button></div><noscript></noscript></div>
                  <div class="opblock opblock-patch" id="operations-default-patch_account_by_id">
                    <div class="opblock-summary opblock-summary-patch"><span class="opblock-summary-method">PATCH</span><span class="opblock-summary-path"><a class="nostyle" href="#/operations/default/patch_account_by_id"><span>/accounts/{id}</span></a>
                      </span>
                      <div class="opblock-summary-description">Updates specified attributes of an existing Account.</div><button class="authorization__btn unlocked" aria-label="authorization button unlocked"><svg width="20" height="20"><use href="#unlocked" xlink:href="#unlocked"></use></svg></button></div><noscript></noscript></div>
                  <div class="opblock opblock-delete" id="operations-default-delete_account_by_id">
                    <div class="opblock-summary opblock-summary-delete"><span class="opblock-summary-method">DELETE</span><span class="opblock-summary-path"><a class="nostyle" href="#/operations/default/delete_account_by_id"><span>/accounts/{id}</span></a>
                      </span>
                      <div class="opblock-summary-description">Deletes a Account by ID.</div><button class="authorization__btn unlocked" aria-label="authorization button unlocked"><svg width="20" height="20"><use href="#unlocked" xlink:href="#unlocked"></use></svg></button></div><noscript></noscript></div>
                  <div class="opblock opblock-head" id="operations-dataAccess-get-dataset-file-operation">
                    <div class="opblock-summary opblock-summary-head"><span class="opblock-summary-method" style="
                  background: #864CCC;
              ">HEAD</span><span class="opblock-summary-path"><a class="nostyle" href="#/operations/dataAccess/get-dataset-file-operation"><span>/files/{dataSetFileId}</span></a>
                      </span>
                      <div class="opblock-summary-description">Gets headers in response signifying what is allowed on this file</div><button class="authorization__btn unlocked" aria-label="authorization button unlocked"><svg width="20" height="20"><use href="#unlocked" xlink:href="#unlocked"></use></svg></button></div><noscript></noscript></div>
                </div>
              
              </div>
        </div>
      </div>
</body>
</html>