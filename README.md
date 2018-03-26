# CMS-Electron-Vuejs-Desktop
Aplicação desenvolvida no curso "Criando um CMS com administração no Desktop" da School of Net


#### Informações das aulas do curso (rascunho)

Instalando Node.js:

Instalando npm:

Instalando o vue.cli e electron:

``npm install -g vue-cli electron``

Se estiver usando Windows:

``npm install -g --production windows-build-tools``

Repositório template electron+vue:

``https://github.com/SimulatedGREG/electron-vue``

Instalar o template utilizando vue:

``vue init simulatedgreg/electron-vue app``

Depois de criado, instalar as dependências e executar a aplicação:

``cd app``

``npm install``

``npm run dev``

Instalar Slim Skeleton (servidor)

``composer create-project slim-slim-skeleton server --prefer-dist``

Depois de criado, rodar (levantar o servidor):

``php -S localhost:8000 -t public``

Instalar os pacotes no server:

``composer require illuminate/database illuminate/events``

``composer require --dev robmorgan/phinx``

Configurar o phinx (init):

``cd vendor``

``vendor/bin/phinx init``

Criar migrations:

``vendor/bin/phinx create PagesTable``

Aplicar as alterações nas migrations:

``vendor/bin/phinx migrate``

Caso seja no docker:

``docker-compose run app vendor/bin/phinx migrate``