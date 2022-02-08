@extends('sales.layout.app')
@section('style')
    <style>
        .accordion.accordion-filled .card .card-header a[aria-expanded="true"] {
            background: #4b49ac;
        }
        .accordion.accordion-filled .card .card-body {
            background: #4b49ac;
        }
    </style>
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Définition des termes SEO </h4>
                            <div class="accordion accordion-filled" id="accordion-1" role="tablist">
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-1">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1" class="collapsed">Cloaking</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-1" class="collapse" role="tabpanel" aria-labelledby="heading-1" data-parent="#accordion-1" style="">
                                    <div class="card-body">
                                        <p class="mb-3">Le cloaking est une des techniques de référencement pour mieux positionner un site sur les résultats de recherche. Cela consiste à adapter le contenu de son site web en fonction des visiteurs: un robot d’indexation des moteurs de recherche ou un visiteur humain. Cette stratégie d’optimisation SEO est souvent utilisée par les référenceurs pour améliorer le positionnement sur le SERP. </p>
                                        <p class="mb-3">Cependant, le cloaking fait partie des stratégies de SEO Black Hat qui sont interdites par les algorithmes de moteur de recherche. Mais les référenceurs préfèrent l’utiliser puisqu’il permet d’améliorer le positionnement d’un site dans un délai rapide. </p>
                                        <h4 class="mb-3">Deux contenus différents pour chaque visiteur</h4>
                                        <p>Dans le but d’obtenir la première position, les professionnels du référencement présentent:</p>
                                        <ul>
                                            <li>Une page suroptimisée par des mots clés pertinents pour le robot. Ici, on fait plaisir aux algorithmes;</li>
                                            <li>Une page avec un contenu de qualité, lisible et agréable pour l’internaute.</li>
                                        </ul>
                                        <p>Au cas où le moteur de recherche repère l’utilisation de cette technique Black Hat SEO, soit votre site est blacklisté ou soit il est supprimé avec son nom de domaine. </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-2">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2" class="collapsed">Black Hat SEO</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-2" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-parent="#accordion-2" style="">
                                    <div class="card-body">
                                        <p class="mb-3">Le Black Hat SEO est l’ensemble des techniques de référencement naturel SEO et d’automatisation qui exploitent les faiblesses des algorithmes des moteurs de recherche. Le but est d’améliorer le positionnement d’un site web sur les résultats de recherche dans un délai rapide. En effet, les sites qui utilisent ces stratégies d’optimisation SEO se retrouvent en première position en un rien de temps. </p>
                                        <h4 class="mb-3">Les techniques Black Hat SEO </h4>
                                        <p>Black Hat SEO regroupe plusieurs techniques de référencement proscrites par le moteur de recherche. Si on ne va citer que quelques unes:</p>
                                        <ul>
                                            <li>Le cloaking consiste à afficher un contenu suroptimisé pour le robot d’indexation et un contenu de qualité pour les internautes;</li>
                                            <li>Keyword stuffing ou bourrage de mots clés. Il s’agit de créer un contenu de mauvaise qualité, le but est seulement de faire plaisir aux algorithmes et non à l’internaute;</li>
                                            <li>Duplicate content ou contenu dupliqué: consiste à copier-coller le contenu d’un ou plusieurs sites en première position sur les SERP;</li>
                                            <li>Échange de liens excessifs;</li>
                                            <li>Spamming des commentaires;</li>
                                            <li>Etc.</li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-3">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3" class="collapsed">Backlink</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-3" class="collapse" role="tabpanel" aria-labelledby="heading-3" data-parent="#accordion-3" style="">
                                    <div class="card-body">
                                        <p class="mb-3">Également appelé lien entrant, lien retour ou lien externe, le backlink est un lien hypertexte placé dans un site internet pointant vers un autre site internet. C’est une des techniques de référencement naturel SEO qui permet d’améliorer le positionnement sur les résultats de recherche.</p>
                                        <p class="mb-3">Le nombre et la qualité des backlinks ont un impact important sur votre visibilité. Plus vous obtenez des backlinks, plus vous augmentez la popularité de votre site web sur les moteurs de recherche. Les algorithmes du moteur de recherche considèrent que les sites populaires sont des sites pertinents et de qualité. C’est pour cette raison que l’obtention de backlinks est un des leviers de la stratégie SEO.</p>
                                        <h4 class="mb-3">Pourquoi utiliser le backlink en stratégie SEO?</h4>
                                        <p>Les avantages d’utiliser des backlinks pour une stratégie SEO sont nombreux:</p>
                                        <ul>
                                            <li>Il permet de générer du trafic vers le site principal de l’entreprise puisque les visiteurs ont tendance à cliquer sur les liens qui pointent vers un autre site;</li>
                                            <li>Augmenter la visibilité sur les moteurs de recherche;</li>
                                            <li>Le lien externe fait partie des piliers utiles en termes de référencement SEO;</li>
                                            <li>Si un site pointe vers un autre site, cela montre la popularité et la notoriété du site de redirection.</li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-4">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4" class="collapsed">LinkExpress</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-4" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-4" style="">
                                    <div class="card-body">
                                        <p class="mb-3">LinkExpress est une agence de netlinking. Nos experts sont prêts à tout pour vous aider à atteindre vos objectifs le plus rapidement possible avec des résultats à long terme. La stratégie netlinking est un des leviers majeurs dans le référencement naturel qui permet de positionner un site web sur la SERP. Par ailleurs, la mise en place peut prendre du temps et de l'énergie surtout si vous ne disposez pas encore des compétences nécessaires pour ce faire. Ainsi, il est préférable d’externaliser votre référencement SEO et d'économiser du temps pour d’autres projets que vous maîtrisez.</p>
                                        <h4 class="mb-3">Qu’est-ce que LinkExpress propose à ses clients?</h4>
                                        <p>En étant professionnel dans le domaine depuis plusieurs années déjà, on vous propose:</p>
                                        <ul>
                                            <li>Expertise et efficience pour qu’on puisse atteindre vos objectifs ensemble;</li>
                                            <li>Une campagne personnalisée parce que chaque site internet a ses propres soucis et on va déployer notre stratégie de backlinks sur mesure pour augmenter votre visibilité et améliorer votre positionnement sur le web;</li>
                                            <li>Thématique et performance: on fera une analyse complète de votre site avant de mettre en place la stratégie;</li>
                                            <li>Backlink dofollow: vous bénéficiez des liens externes de qualité pour que les résultats soient durables;</li>
                                            <li>Publication naturelle en utilisant des liens SEO;</li>
                                            <li>Reporting et suivi des actions effectuées pour vous offrir une transparence totale.</li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-5">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5" class="collapsed">Seobserver</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-5" class="collapse" role="tabpanel" aria-labelledby="heading-5" data-parent="#accordion-5" style="">
                                    <div class="card-body">
                                        <p class="mb-3">SEObserver est un outil d’analyse incontournable dans une stratégie de référencement naturel SEO. Cet outil en SAS est créé par Kévin Richard et propose tous les services nécessaires pour un bon suivi de la stratégie SEO mise en place. Il se base sur le monitoring des résultats de recherche et sur les sites et leurs métriques, surtout leurs backlinks. Ce sont les consultants SEO et les agences web SEO qui sont ravis de cette nouvelle fonctionnalité parce qu’il permet de suivre de près l’évolution du positionnement d’un site sur les moteurs de recherche.</p>
                                        <h4 class="mb-3">Les raisons pour utiliser SEObserver</h4>
                                        <p>SEObserver est très apprécié dans le domaine de référencement naturel pour de nombreuses raisons:</p>
                                        <ul>
                                            <li>Simple à utiliser: c’est ce qui lui différencie des autres suites SEO puisqu’il est très facile à prendre en main pour bénéficier de ses avantages;</li>
                                            <li>La transversalité: un simple clic suffit pour passer des rankings aux backlinks par exemple;</li>
                                            <li>Économique car les utilisateurs ont la possibilité de couper les abonnements aux autres outils;</li>
                                            <li>Ajoutez une extension chrome pour rendre l’analyse plus rapide. </li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-6">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-6" aria-expanded="false" aria-controls="collapse-6" class="collapsed">Dofollow / Nofollow</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-6" class="collapse" role="tabpanel" aria-labelledby="heading-6" data-parent="#accordion-6" style="">
                                    <div class="card-body">
                                        <p class="mb-3">En référencement naturel, l’importance des liens pointant vers votre site internet est incontestable. Sur le moteur de recherche Google, il existe deux types de liens: DoFollow et NoFollow.</p>
                                        <h4 class="mb-3">Le lien DoFollow</h4>
                                        <p>C’est le synonyme du lien dit “normal” parce qu’il n’y a aucun attribut dans le code du lien ni un attribut DoFollow. Il définit la popularité d’un site internet où il pointe sur le web et indique aux robots d’indexation qu'il existe un lien qui permet d’identifier d’autres documents.</p>
                                        <P>Un lien DoFollow est un lien sortant pointant à une page et permet à cette page de:</P>
                                        <ul>
                                            <li>Obtenir le “jus de lien” ou la notoriété;</li>
                                            <li>Un référencement grâce à l’ancre textuelle.</li>
                                        </ul>
                                        <h4>Le lien NoFollow</h4>
                                        <P>Contrairement aux liens DoFollow, les liens NoFollow ne servent à rien pour le référencement naturel. En effet, ils ne consistent pas à améliorer la notoriété ni le positionnement d’un site internet sur les résultats de recherche.</P>
                                        <P>Le lien NoFollow est utilisé de deux façons:</P>
                                        <ul>
                                            <li>Dans une balise meta pour indiquer aux robots qu’il ne doit suivre aucun lien sur la page web;</li>
                                            <li>Dans une balise de lien pour indiquer aux moteurs de recherche que ce lien ne doit pas être tenu compte pendant son analyse.</li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-7">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-7" aria-expanded="false" aria-controls="collapse-7" class="collapsed">Bouillie SEO</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-7" class="collapse" role="tabpanel" aria-labelledby="heading-7" data-parent="#accordion-7" style="">
                                    <div class="card-body">
                                        <p class="mb-3">Une bouillie SEO est le terme utilisé pour définir un contenu de mauvaise qualité qui est souvent issu des techniques de content spinning. Cette technique consiste à générer de nombreux contenus juste pour rediriger vos visiteurs sur une votre page principale. Avec la bouillie SEO, vous avez la possibilité de créer une grande quantité de contenu grâce à l’utilisation des logiciels dans un délai rapide.</p>
                                        <p class="mb-3">Améliorer le positionnement de son site web sur les résultats de moteur de recherche avec la stratégie de contenu est intéressant que ce soit avec de la bouillie SEO ou un contenu de qualité.</p>
                                        <h4 class="mb-3">Quel est le meilleur logiciel de content spinning?</h4>
                                        <P>Voici une liste non exhaustive des logiciels souvent utilisés par les professionnels de bouillie SEO:</P>
                                        <ul>
                                            <li>Deepl et Zennoposter sont les meilleurs logiciels d’automatisation et faciles à utiliser;</li>
                                            <li>GSA Content Generator: l’abonnement est à payer une seule fois et le plus performant;</li>
                                            <li>WordAl: met en avant l’intelligence artificielle pour toute automatisation.</li>
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" role="tab" id="heading-8">
                                    <h4 class="mb-0">
                                      <a data-bs-toggle="collapse" href="#collapse-8" aria-expanded="false" aria-controls="collapse-8" class="collapsed">Zennoposter</a>
                                    </h4>
                                  </div>
                                  <div id="collapse-8" class="collapse" role="tabpanel" aria-labelledby="heading-8" data-parent="#accordion-8" style="">
                                    <div class="card-body">
                                        <p class="mb-3">Zennoposter est un excellent outil pour tout automatiser sur internet. Il s’agit d’un logiciel multifonction russe permettant de modifier un processus de façon qu’il s’opère sans intervention humaine. Ainsi, il vous aide à automatiser diverses activités comme le référencement, le SEA, le webmarketing, le SEM et bien d’autres.</p>
                                        <p class="mb-3">Cet outil est disponible en 3 versions qui sont principalement :</p>
                                        <ul>
                                            <li>La version lite</li>
                                            <li>La version standard</li>
                                            <li>La version professionnelle (idéale pour lancer des templates)</li>
                                        </ul>
                                        <h4 class="mb-3">Que peut-on automatiser avec Zennoposter ?</h4>
                                        <P>Avec ce logiciel informatique, vous pouvez :</P>
                                        <ul>
                                            <li>Créer des comptes en masse : des profils web, des forums, des réseaux sociaux…</li>
                                            <li>Scraper rapidement des informations sur des sites regroupant des prospects</li>
                                            <li>Gérer des captchas et des proxys</li>
                                        </ul>
                                        <p>En SEO, les principales utilisations sont l’automatisation des créations de comptes, type Facebook ou Twitter.</p>
                                        <p>Ceci vous aide à gagner du temps et à maximiser vos profits sur internet. Toutefois, pour atteindre ces deux objectifs, il s’avère très important de maîtriser cet outil très puissant. Son utilisation ne requiert pas de compétences spécifiques, mais il est possible de suivre une formation pour comprendre les techniques essentielles à son fonctionnement.</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-9">
                                      <h4 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-9" aria-expanded="false" aria-controls="collapse-9" class="collapsed">iMacros</a>
                                      </h4>
                                    </div>
                                    <div id="collapse-9" class="collapse" role="tabpanel" aria-labelledby="heading-9" data-parent="#accordion-9" style="">
                                      <div class="card-body">
                                          <p class="mb-3">Créé en 2001 par Mathias Roth, iMacros est un module d’extension conçu spécialement pour enregistrer des macros sur les navigateurs web. C’est le premier outil d’enregistrement et de répétition optimisé pour Firefox, Internet Explorer et Chrome. L’extension permet d’effectuer des tâches répétitives telles que le remplissage de formulaire ou la visite de pages web.</p>
                                          <p class="mb-3">C’est en quelque sorte une application basée sur un navigateur pour l’enregistrement, l’édition et la lecture de macros pour l’automatisation et les tests Web.</p>
                                          <h4 class="mb-3">Voici une liste concrète de l’utilité de l’extension :</h4>
                                          <ul>
                                              <li>Tester un site web ou une application web.</li>
                                              <li>Remplir des formulaires ou de mot de passe en 1 clic surtout pour les personnes qui commentent souvent sur des blogs.</li>
                                              <li>Extraire des données de façon automatisée (export en CSV).</li>
                                          </ul>
                                          <p>La version pour Firefox et Chrome présente des fonctionnalités supplémentaires considérées comme script social. Celui-ci donne la possibilité aux utilisateurs de partager des macros et des scripts de la même manière que le bookmarking social.</p>
                                          <p>L’iMacros freeware est disponible en tant qu’application commerciale avec des caractéristiques spécifiques et un support idéal aux scripts Web, à la surveillance du serveur Internet et aux tests Web.</p>
                                          <p>Les versions avancées bénéficient également d'une interface de ligne de commande et une interface de programmation d’application (API) pour automatiser des tâches plus complexes et s’adapter à d’autres programmes.</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-10">
                                      <h4 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-10" aria-expanded="false" aria-controls="collapse-10" class="collapsed">Grey Hat SEO</a>
                                      </h4>
                                    </div>
                                    <div id="collapse-10" class="collapse" role="tabpanel" aria-labelledby="heading-10" data-parent="#accordion-10" style="">
                                      <div class="card-body">
                                          <p class="mb-3">Comme son nom l’indique, le Grey Hat SEO est une technique de référencement qui se situe entre le Black Hat qui est une technique cherchant à contourner les algorithmes de surveillance de Google SEO et le White Hat SEO qui est une méthode en accord avec les réglementations de Google.</p>
                                          <p class="mb-3">Le Grey Hat SEO consiste donc à employer le White Hat tout en faisant usage des techniques non conventionnelles du Black Hat SEO pour s’afficher sur les premières pages de Google. En réalité, on constate actuellement que 90 % des sites présents sur la toile utilisent cette stratégie pour leur positionnement.</p>
                                          <p class="mb-3">Ce dernier comporte des techniques telles que :</p>
                                          <ul>
                                              <li>Cloaking</li>
                                              <li>Achat de domaines expirés</li>
                                              <li>Réseaux de sites</li>
                                              <li>Achat de lien</li>
                                              <li>Automatisation des médias sociaux et achat d’abonnés</li>
                                          </ul>
                                          <h4>Les techniques du Grey Hat SEO</h4>
                                          <p>En compromis avec les deux méthodes de référencement, vous pouvez utiliser le Grey Hat avec d’autres techniques tout en respectant les limites de réglementation. De ce fait, il est possible d’acheter des liens renvoyant sur les pages web que l’on souhaite référencer, d’acheter des abonnés sur les réseaux sociaux, ou encore de publier des posts automatiques afin d’aller plus vite.</p>
                                          <p>En ce qui concerne les mots-clés, si vous placez l’un d’entre eux de manière stratégique, tout en réalisant un contenu propre et de qualité, vous faites en réalité du Grey Hat SEO.</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-11">
                                      <h4 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-11" aria-expanded="false" aria-controls="collapse-11" class="collapsed">Netlinking</a>
                                      </h4>
                                    </div>
                                    <div id="collapse-11" class="collapse" role="tabpanel" aria-labelledby="heading-11" data-parent="#accordion-11" style="">
                                      <div class="card-body">
                                          <p class="mb-3">Le Netlinking ou link building ou encore linking externe fait partie des éléments composants d'une stratégie SEO. Sa stratégie peut être white, grey ou black-hat.  Cette technique de tissage de liens permet d'améliorer la visibilité et le positionnement d'un site web grâce à des Backlinks afin de créer un réseau.</p>
                                          <p class="mb-3">Son principe repose sur la multiplication de liens hypertextes pointant vers la page internet à rendre plus visible. Le netlinking n’est pas à négliger pour travailler une stratégie SEO.</p>
                                          <p class="mb-3">Considéré comme une méthode fondamentale du référencement, les liens reçus par les pages d'un site web lui donnent de la valeur, car ils montrent que d'autres sites approuvent son contenu et y font référence. Ce critère de célébrité est l'un des principaux ingrédients du SEO. Toutes plateformes souhaitant bien se positionner sur les SERPs deBing, Google ou Yahoo ont donc l’obligation d’entreprendre une campagne de Netlinking.</p>
                                            <h4>Pourquoi le netlinking est-il utile au SEO ?</h4>
                                            <p>Cette démarche présente de nombreux avantages :</p>
                                            <p>Tout d’abord, il permet d’améliorer la qualité et de booster le trafic en offrant aux internautes l’opportunité d'arriver sur le site en évaluant son contenu puisqu’un netlinking bien établi est favorable aux conversions. </p>
                                            <p>Le Netlinking permet aussi de développer la popularité d’un site internet pour obtenir un meilleur référencement naturel. Effectivement, il est souvent complexe pour un site de se positionner dans les pages de résultats sans avoir des liens externes pointés vers lui.</p>
                                            <p>Cette démarche donne aux crawlers la possibilité de découvrir plus de sites et de nouvelles pages. Il est à noter que les liens externes restent le principal vecteur s'assurant que des pages existent toujours afin d’en trouver de nouvelles.</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-12">
                                      <h4 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-12" aria-expanded="false" aria-controls="collapse-12" class="collapsed">Scrapebox</a>
                                      </h4>
                                    </div>
                                    <div id="collapse-12" class="collapse" role="tabpanel" aria-labelledby="heading-12" data-parent="#accordion-12" style="">
                                      <div class="card-body">
                                          <p class="mb-3">Lancé en 2009, ScrapeBox n’est autre qu’un logiciel utilisé en référencement conçu pour faire gagner aux référenceurs black-hat beaucoup de temps. Celui-ci permet de retirer des données, de réaliser des pings et de poster des données. Il s’agit d’un logiciel de scraping. Le scraping ou Harvesting est une technique bien connue des Growth Hackers. Il consiste à  récolter les données à partir de pages web indexées dans les SERP.</p>
                                          <p class="mb-3">Ce logiciel est constamment mis à jour pour s'adapter aux évolutions du web depuis sa création. Une véritable alternative aussi bien pour le SEO que le marketing</p>
                                          <h4>Les différents fonctionnalités du ScrapeBox</h4>
                                            <p>Cet outil permet de former des listes d’URL à partir de mots-clés et de footprints. La possibilité de spécifier les footprints et d’utiliser plusieurs mots-clés pour affiner la recherche est l’un des grands avantages de Scrapebox.</p>
                                            <p>Vous pouvez ainsi :</p>
                                            <ul>
                                                <li>Générer des listes d’URL à partir de plusieurs mots-clés ou requêtes</li>
                                                <li>Pinger des centaines d'URL facilement</li>
                                                <li>Ajouter des commentaires sur des blogs</li>
                                                <li>Connaître le PageRank de centaines d'URL</li>
                                                <li>Rechercher et utiliser de proxys</li>
                                                <li>Vérifier la présence de backlinks sur des sites web tiers</li>
                                                <li>Scraper des emails pour faire des échanges de liens</li>
                                                <li>Gérer des listes de centaines d'URL pour faciliter la tâche</li>
                                            </ul>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-13">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-13" aria-expanded="false" aria-controls="collapse-13" class="collapsed">Google alerts</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-13" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Google Alerts ou Google alertes est un service gratuit du gigantesque réseau internet permettant d’inspecter certains sujets qui vous attachent. Vous recevrez des emails lorsque les termes que vous avez prédéfinis apparaîtront dans le top 20 des sites web ou dans le top 10 des résultats organiques de Google.</p>
                                            <h4>Pourquoi est-ce indispensable ?</h4>
                                              <p>Cet outil permet de former des listes d’URL à partir de mots-clés et de footprints. La possibilité de spécifier les footprints et d’utiliser plusieurs mots-clés pour affiner la recherche est l’un des grands avantages de Scrapebox.</p>
                                              <p>Connu comme un excellent outil marketing, il permet de créer des alertes personnalisées pour être notifié dès que le sujet apparaît ou mentionné dans les résultats de Google. Pour créer une alerte, trois options sont possibles, soit vous serez informé à tout moment, une fois par jour ou chaque semaine. L’option hebdomadaire suffit si le sujet que vous surveillez n’est pas trop important.</p>
                                              <p>Cet outil de surveillance vous sera utile pour suivre les mentions de mots-clés sur les différents sites web, y compris les médias sociaux, les sites d’actualité, les blogs ainsi que les forums.</p>
                                              <p>Ce service est la meilleure option à adopter pour ceux qui veulent toujours rester au courant des nouvelles tendances sur l’indexation des nouvelles pages.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-14">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-14" aria-expanded="false" aria-controls="collapse-14" class="collapsed">Splogging</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-14" class="collapse" role="tabpanel" aria-labelledby="heading-14" data-parent="#accordion-14" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Le terme splog ou « spam blog » est apparu au début des années 2000 au fil de l’évolution du blogging. Le mot « Splogging » résulte principalement de la contraction des termes spam et blog. Il s’agit donc de la combinaison de « spam » et « blog ». En bref, il s’agit d’un blog factice dont le contenu est incompréhensible.</p>
                                            <h4>Comment fonctionne le Splogging ?</h4>
                                              <p>Le splog est un blog créé dans le seul objectif d’établir un lien vers d’autres sites internet associés. C’est une nouvelle façon pour les professionnels du marketing en ligne d’exploiter les nouveaux médias. Celui-ci est très prisé pour la mise en place des techniques exclues de la stratégie black hat SEO, afin de faire grimper un site de façon non naturelle dans les résultats de recherche des moteurs.</p>
                                              <p>Cette plateforme fait partie des techniques de référencement dans l’e-réputation dit abusif d’où son utilisation à des fins négatives. Dans ce cas, les blogs de spam sont employés pour :</p>
                                              <ul>
                                                  <li>Manipuler les résultats des moteurs de recherche</li>
                                                  <li>Afficher des contenus mal écrits ou répétitifs</li>
                                                  <li>Occuper le classement du moteur de recherche</li>
                                              </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-15">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-15" aria-expanded="false" aria-controls="collapse-15" class="collapsed">Page generator pro</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-15" class="collapse" role="tabpanel" aria-labelledby="heading-15" data-parent="#accordion-15" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Optimisez votre présence sur les moteurs de recherche avec du contenu en masse. Page generator Pro est un outil qui permet de générer automatiquement du contenu comme des pages, des pages et des messages personnalisés. Et même si le contenu est issu d’une programmation, la simulation du texte suit des règles ou des scripts qui auront un impact majeur sur la qualité de l’article. Ensuite, il sera publié sur une URL spécifique.</p>
                                            <p>Le but de cette technique est de gagner un meilleur positionnement sur Google et augmenter le taux de conversion en utilisant les mots clés longue traîne. Cependant, c’est une technique SEO Black Hat qui est interdite par le moteur de recherche.</p>
                                            <h4>Les fonctionnalités de Page Generator Pro</h4>
                                              <p>Générer du contenu automatiquement est une pratique qui ne doit pas être utilisée sur des sites internet qui sont destinés à durer longtemps. Utiliser Page generator pro vous offre plusieurs possibilités avec ses nombreuses fonctionnalités:</p>
                                              <ul>
                                                  <li>Créer des pages spécifiques;</li>
                                                  <li>Répertorier des produits ou des produits;</li>
                                                  <li>Créer des contenus pour votre blog.</li>
                                              </ul>
                                              <p>Pour ce faire, vous devez d’abord définir les mots clés liés à un lieu, un service ou un produit et utilisez-le dans un contenu pour générer un contenu de masse pour vos pages, messages ou types de message en fonction de votre modèle. Les mots clés utilisés et les termes sont différents et uniques pour chaque contenu. Ainsi, vous obtenez un contenu unique et parfait pour les moteurs de recherche.</p>
                                              <p>De plus, Page Generator Pro fonctionne également avec l’éditeur classique, Gutenberg et la majorité des créateurs de pages comme Elementor, Divi, Visual Composer ou autres.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-16">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-16" aria-expanded="false" aria-controls="collapse-16" class="collapsed">Jérôme Pasquelin</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-16" class="collapse" role="tabpanel" aria-labelledby="heading-16" data-parent="#accordion-16" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Jérôme PASQUELIN est un consultant web de 40 ans. Il a suivi une formation en action commerciale dans le domaine du marketing. Après avoir fini, il a pris une voie dans l’informatique pour maîtriser les différents langages et devenir développeur web. Ses 15 années d’expériences sur le web lui ont permis de devenir un consultant web spécialisé en référencement Google.</p>
                                            <p>Grâce à son parcours en marketing et ses expériences en informatique, il est devenu un expert aguerri sur le domaine du référencement. En plus, il propose une formation complète et donne des cours à l’école Multimédia à Paris.</p>
                                            <h4 class="mb-3">Le parcours professionnel de Jérôme Pasquelin</h4>
                                              <p>Comme c’est un professionnel polyvalent, on se doute bien qu’il a eu de nombreuses compétences sur divers domaines. Il a commencé sa carrière en tant que consultant web avec ses expériences de quelques années dans le SEO tout en faisant de la création et de la maintenance de sites web.</p>
                                              <p>Cette formation lui a donné la possibilité de travailler en tant qu’assistant webmaster pour une société de vente de matériel informatique et high-tech appelée GrosBill. Après avoir montré ses compétences dans la même société, il est devenu webmaster et responsable front office.</p>
                                              <p>Ses compétences en webmaster sont consolidées grâce à son travail pour Auchandirect. C’est à ce moment qu’il a découvert le SEO et lui a donné envie de se former. Il a commencé à apprendre ce domaine à partir des formations sur des sites personnels qu’il a montés. Puis, des formations professionnalisantes pour qu’il puisse se lancer en tant qu'indépendant.</p>
                                              <h4 class="mb-3">Ses casquettes</h4>
                                              <P>Jérôme Pasquelin a de nombreuses casquettes:</P>
                                              <ul>
                                                  <li>Consultant SEO indépendant depuis 2012;</li>
                                                  <li>Éditeur de sites internet;</li>
                                                  <li>Formateur dans des écoles privées;</li>
                                                  <li>Formateur en ligne.</li>
                                              </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-17">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-17" aria-expanded="false" aria-controls="collapse-17" class="collapsed">BHM Generator</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-17" class="collapse" role="tabpanel" aria-labelledby="heading-17" data-parent="#accordion-17" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Développé en 2019, BHM Generator fait partie des outils Software As A Service (SAAS) créés spécialement pour générer du contenu sur des sites internet. Ce SEO black hat a été conçu par Romain Pirotte qui est un expert SEO pratiquant depuis des années les stratégies de référencement méconnues et refusées par Google.</p>
                                            <p>Ce logiciel utilisable en ligne est présenté avec un plugin WordPress afin d’introduire de manière automatique les contenus générés au sein de WordPress.</p>
                                            <p>C’est un excellent outil pour établir des stratégies de référencement avancées puisqu’il est plus efficace et complet que les autres scripts de génération de contenu. Parmi les techniques de génération de contenu, la bouillie est la méthode la plus prisée. Une fois que vous êtes équipé d’un script BHM Generator, vous n’aurez plus du mal à produire du contenu.</p>
                                            <h4 class="mb-3">Le fonctionnement du BHM Generator</h4>
                                            <p>Disposant un plugin spécifique, cette machine à gérer du contenu offre des options avancées de cloaking. Il se divise principalement en 2 outils bien distincts :</p>
                                            <p>1- L’outil SAAS : il n’est accessible qu’une fois que vous avez achevé une formation.</p>
                                            <p>Ce dernier permet de :</p>
                                            <ul>
                                                <li>Modifier les thèmes pour créer automatiquement des contenus.</li>
                                                <li>Télécharger le plugin WordPress BHM Generator.</li>
                                                <li>Consulter des tutoriels pour la mise en place des différentes stratégies.</li>
                                            </ul>
                                            <p>2- Le plugin WordPress : utile pour synchroniser vos contenus sur votre site Wordpress. Il vous suffit de récupérer l’ensemble de vos contenus en quelques clics. Pour cela :</p>
                                            <ul>
                                                <li>Installez le module wp-bhm-generator sur votre site Wordpress.</li>
                                                <li>Insérez ensuite la clé API.</li>
                                                <li>Reliez vos catégories Wordpress avec les thématiques générées sur l’outil BHM Generator.</li>
                                                <li>Choisissez vos méthodes de redirections.</li>
                                            </ul>
                                            <p>Finalement, vous pouvez activer ou non la synchronisation automatique.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-18">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-18" aria-expanded="false" aria-controls="collapse-18" class="collapsed">WP Automatic</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-18" class="collapse" role="tabpanel" aria-labelledby="heading-18" data-parent="#accordion-18" style="">
                                        <div class="card-body">
                                            <p class="mb-3">WP Automatic ou Wordpress Automatic Plugin posts est un outil permettant de scraper tout type de contenu comme les produits Amazon ou eBay. Il vous est possible de l’utiliser pour faire une veille via flux RSS et publier un extrait.</p>
                                            <p>Ce plugin automatique de Wordpress permet de publier automatiquement des messages sur WordPress à partir de presque n'importe quel site web. Il peut importer depuis des sites populaires comme Youtube et Twitter en utilisant leurs API ou depuis presque n'importe quel site de votre choix en utilisant ses modules de grattage.</p>
                                            <p>C’est l'un des meilleurs plugins de récupération de contenu pour WordPress. Il est conçu et développé par ValvePress et disponible sur le marché Codecanyon. Ce plugin publie automatiquement des articles réguliers, des produits Clickbank, des produits Amazon, des vidéos youtube, des publications de flux, et bien plus encore.</p>
                                            <p>Il vous suffit de créer une campagne et de vous détendre, le plugin automatique WordPress publiera du contenu en fonction de vos paramètres de campagne sur le pilote automatique. Ce dernier offre aussi une option pour faire tourner le contenu publié en utilisant «le meilleur spinner».</p>
                                            <h4 class="mb-3">Les principales caractéristiques du plugin automatique WordPress</h4>
                                            <ul>
                                                <li>Prise en charge de l'API d'affiliation Amazon</li>
                                                <li>Rechercher et remplacer des mots dans l'option d'article</li>
                                                <li>Produits Clickbank avec le support des liens d'affiliation</li>
                                                <li>Options d'annonces</li>
                                                <li>API EzineArticles</li>
                                                <li>Le meilleur support Spinner pour la réécriture de contenu</li>
                                                <li>Prise en charge de l'API Flicker</li>
                                                <li>Prise en charge de l'API Youtube</li>
                                                <li>Assistance WooCommerce</li>
                                                <li>Options d'affiliation iTunes</li>
                                                <li>Assistance aux affiliés Envato</li>
                                                <li>Autoriser à configurer la fréquence de mise à jour</li>
                                                <li>Limiter le nombre maximum de messages</li>
                                                <li>Option de modèle de publication</li>
                                                <li>Image en vedette automatique</li>
                                                <li>Prise en charge de différents post-filtres</li>
                                                <li>Traduire le message avant de le publier</li>
                                                <li>Prise en charge du langage WPML</li>
                                                <li>Messages automatiques du flux RSS</li>
                                                <li>Auto publie les produits Amazon, eBay, Walmart et Clickbank.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-19">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-19" aria-expanded="false" aria-controls="collapse-19" class="collapsed">Web.editor</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-19" class="collapse" role="tabpanel" aria-labelledby="heading-19" data-parent="#accordion-19" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Considéré comme un éditeur de pages web léger, Web Editor ou éditeur HTML ou éditeur web est un logiciel conçu pour faciliter la préparation et la modification de documents écrits en Hypertext Markup Language (HTML) qui est le principal composant d’une page web. Dans ce cas, il supporte les formats HTML, CSS, JS et bien d’autres.</p>
                                            <p>Avec WebEditor, vous allez pouvoir : </p>
                                            <ul>
                                                <li>Installer un ou plusieurs sites sur l’un de vos hébergements. Vous n’avez qu’à renseigner votre API Internet.bs et Cloudflare, l’outil se chargera de configurer automatiquement vos noms de domaine.</li>
                                                <li>Optimiser des sites avec le référencement white hat, black hat ou PBN sans aucun footprints mais avec des templates prédéfinis.</li>
                                                <li>Choisir le degré de personnalisation de vos sites</li>
                                                <li>Intégrer vos équipes de rédacteurs à votre projet pour qu’ils puissent bénéficier d’une interface personnalisée.</li>
                                                <li>Calculer vos dépenses en rédaction</li>
                                                <li>Gérer tous vos contenus. Vous pourrez donc valider et publier 10, 20, 30 000 mots en quelques clics depuis l’outil, et cela vers tous vos sites.</li>
                                                <li>Commander des contenus sur les plateformes de rédaction : par exemple sur le White.Page.</li>
                                                <li>Traduire vos contenus.</li>
                                                <li>Installer et gérer les certificats SSL.</li>
                                                <li>Surveiller par monitorage tout votre réseau : en cas de problème, vous recevrez une alerte email.</li>
                                                <li>Rendre populaires vos liens.</li>
                                                <li>Faire des liens thématiques vers vos MS grâce aux différentes offres de Netlinking.</li>
                                                <li>Acheter des Web Profils sur des sites d’autorités.</li>
                                            </ul>
                                            <p>Il existe deux catégories d’éditeur :</p>
                                            <h4 class="my-3">Les éditeurs WYSIWYG</h4>
                                            <p>Cet éditeur permet d’éditer une page Web à peu près telle qu’elle apparaît dans les navigateurs courants. Ayant les mêmes fonctions que le traitement de texte classique, il a pour avantage de faciliter l’utilisation et l’observation immédiate du rendu graphique.</p>
                                            <h4 class="my-3">Les éditeurs de texte</h4>
                                            <p>Contrairement à l’éditeur WYSIWYG, ce type d’éditeur se convertit directement en langage HTML. Ainsi, les codes traités vont apparaître comme du texte.</p>
                                            <p>Pour s’en servir, il est essentiel de disposer des logiciels comme les outils utilisant les technologies PHP, JSP, ASP, Perl ou CGI.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-20">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-20" aria-expanded="false" aria-controls="collapse-20" class="collapsed">Ninjalinking</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-20" class="collapse" role="tabpanel" aria-labelledby="heading-20" data-parent="#accordion-20" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Ninjalinking est un outil conçu pour réaliser des backlinks afin de doubler votre trafic SEO en quelques semaines. Le terme « Link ninja » désigne une méthode de netlinking consistant à mettre en place soi-même des liens vers son site.</p>
                                            <h4 class="my-3">Les avantages du Ninjalinking</h4>
                                            <p>Facile et rapide, il vous suffit de de trouver un site sur lequel insérer un lien afin qu’il soit validé par le webmaster qui le gère. Le Ninjalinking est donc en quelque sorte l’art de placer des liens gratuitement sur Internet sur des sites tels que des forums, des webprofils ou des commentaires dans la manière la plus discrète possible comme le Ninja !</p>
                                            <p>Il faut juste que vous essayiez de vous intégrer au contexte et d’être discret pour que le lien génère potentiellement du trafic. De plus, avec cette technique, vous allez maîtriser facilement l’ancre de votre lien.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-21">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-21" aria-expanded="false" aria-controls="collapse-21" class="collapsed">LinksGarden</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-21" class="collapse" role="tabpanel" aria-labelledby="heading-21" data-parent="#accordion-21" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Lancée par l’agence G2 Edition, LinksGarden n’est autre qu’une plateforme de Netlinking et de gestion de campagne pour gagner en visibilité sur les moteurs de recherches. Elle fournit des milliers de sites thématiques en exclusivité afin que vous puissiez gérer vos campagnes de backlinks en toute autonomie. En effet, celle-ci offre environ 1 800 spots sur différentes thématiques avec des prix attractifs.</p>
                                            <h4 class="my-3">Comment fonctionne cette plateforme de backlinks ?</h4>
                                            <p>Vous n’avez rien à craindre sur cette plateforme puisque la confidentialité de ses clients est primordiale. Son tarif varie selon la gamme choisie, à compter jusqu’à 100 € HT rédaction comprise. Les sites sont thématisés, soignés, uniques et privés.</p>
                                            <p>Ainsi, vous pouvez :</p>
                                            <ul>
                                                <li>Générer plus de trafic avec les moteurs de recherche</li>
                                                <li>Améliorer votre business tout en achetant</li>
                                                <li>Acheter des liens sur des sites de différents thèmes en toute discrétion</li>
                                            </ul>
                                            <p>En outre, ses sites partenaires sont tous sélectionnés manuellement pour assurer la qualité du service. Son service premium de gestion de campagne de Netlinking est facultatif. Vous pouvez solliciter leur aide pour réaliser vos audits ou même demander un reporting mensuel complet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-22">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-22" aria-expanded="false" aria-controls="collapse-22" class="collapsed">Spamdexing</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-22" class="collapse" role="tabpanel" aria-labelledby="heading-22" data-parent="#accordion-22" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Le Spamdexing est l’ensemble des techniques frauduleuses interdites par les moteurs de recherche pour manipuler leurs algorithmes. Cela consiste à créer de faux liens grâce au référencement black hat. Ce terme anglais symbolise donc le référencement abusif puisqu’il vient de l’association de deux mots « spam » et « indexing » qui veut dire indexation.</p>
                                            <p class="my-3">Ce sont notamment les éditeurs de site Web ainsi que les vendeurs de produit ou service qui l’utilisent fréquemment pour remplir les forums et les réseaux sociaux de liens pointant vers son site. Tout cela dans le but d’améliorer leurs classements dans les moteurs de recherche à partir d’un mot clé prédéfini. Ces professionnels vont tromper les SERP pour afficher une page dans l’index des moteurs pour que vous tombiez dessus lors de vos recherches.</p>
                                            <h4 class="my-3">Les stratégies les plus connues considérées comme du spamdexing</h4>
                                            <p>Pour occuper le terrain, les utilisateurs de ce référencement abusif font :</p>
                                            <ul>
                                                <li>La mise en place de mots-clés de la même couleur que le fond de page : on parle ici des mots-clés invisibles ou invisible words.</li>
                                                <li>L’insertion de mots-clés dans les méta-tags sans aucun rapport avec le site.</li>
                                                <li>La répétition de mots-clés : appelé aussi bourrage de mots-clés ou stuffing.</li>
                                                <li>Le détournement de pages web : pagejacking.</li>
                                                <li>L’utilisation abusive d’alias de domaine ou de sous-domaines. La soumission de contenus sous différents noms de domaine n’est pas tolérée par la plupart des moteurs de recherche et des annuaires.</li>
                                                <li>L’indexation totale des pages auprès des moteurs de recherche.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-23">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-23" aria-expanded="false" aria-controls="collapse-23" class="collapsed">Youdot</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-23" class="collapse" role="tabpanel" aria-labelledby="heading-23" data-parent="#accordion-23" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Youdot est une plateforme créée dans le but d’améliorer le référencement de chaque site en créant des blogs optimisés à partir des noms de domaine expirés. Contrairement aux noms de domaine vierges, les noms de domaine expirés procurent de nombreux avantages en termes de référencement.</p>
                                            <p class="my-3">La création d’un blog optimisé est une solution pour apporter du jus SEO à une page web et profiter de ses backlinks afin de générer plus de contenu en quelques clics.  Youdot est considérée comme une plateforme de vente de noms de domaine expirés. La vente se fait aux enchères.</p>
                                            <h4 class="my-3">Les avantages d’utiliser Youdot</h4>
                                            <p>En optant pour cette solution, vous allez bénéficier des meilleurs indicateurs du marché : Le gros intérêt de YouDot est de travailler sa stratégie SEO. Pour ce faire,  la prestation s’appuie sur un indicateur appelé Dot Rank, qui va de 0 à 100. Plus le score n’est élevé, plus le potentiel SEO est élevé.</p>
                                            <p>Ainsi, vous pouvez :</p>
                                            <ul>
                                                <li>Récupérer des noms de domaine(NDD)  avec du potentiel SEO</li>
                                                <li>Acheter des noms de domaines expirés</li>
                                                <li>Bénéficier des backlinks d’autorité</li>
                                                <li>Le détournement de pages web : pagejacking.</li>
                                                <li>Créer des sites optimisés pour une stratégie de référencement efficace</li>
                                                <li>Avoir un positionnement Google déjà existant</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-24">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-24" aria-expanded="false" aria-controls="collapse-24" class="collapsed">Domexpire</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-24" class="collapse" role="tabpanel" aria-labelledby="heading-24" data-parent="#accordion-24" style="">
                                        <div class="card-body">
                                            <p class="mb-3">DomExpire est le tout nouveau service de récupération des noms de domaine. fr. Il s’agit d’un bureau d’enregistrement approuvé par l’Afnic qui est une organisation qui gère l’extension et la récupération des noms de domaines dès qu’ils expirent ou redeviennent libres.</p>
                                            <h4 class="my-3">La spécificité du Domexpire</h4>
                                            <p class="my-3">Ce bureau d’enregistrement (BE) agréé AFNIC a pour objectif de vous proposer des noms de domaines qui vont booster votre SEO. Dans ce cas, vous pouvez solliciter leur expertise pour concevoir vos noms de domaine. fr.</p>
                                            <p>Son équipe peut aussi récupérer les noms domaine qui vont expirés, c’est notamment leur activité principale. Cela peut être également un nom de domaine expiré et un nom de domaine qui n’a pas été renouvelé et qui retombe parmi les domaines disponibles.</p>
                                            <p>Vous pouvez acheter sur cette plateforme des noms de domaine nouvellement expirés pour booster votre référencement. Vous pouvez faire usage des metrics disponibles pour trouver facilement le NDD expiré qui vous convient. De ce fait, vous avez la possibilité de l’intégrer dans votre PBN, remonter un site dans une thématique proche ou bien faire une redirection 301.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-25">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-25" aria-expanded="false" aria-controls="collapse-25" class="collapsed">Black Hat Money</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-25" class="collapse" role="tabpanel" aria-labelledby="heading-25" data-parent="#accordion-25" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Black Hat Money est un concept novateur développé par Romain Pirotte, un jeune français expert en SEO. La formation Black Hat Money (BHM) de Romain Pirotte est faite pour ceux qui souhaitent gagner de l’argent plus rapidement en ligne.</p>
                                            <p class="my-3">Après avoir testé différentes techniques de référencements inefficaces, ce professionnel a réussi à concevoir ses propres techniques en faisant preuve de volonté. Il est à préciser que ce dernier a créé des milliers de sites en Black Hat SEO.</p>
                                            <p>La formation Black Hat Money permet aux webmasters d’attirer du trafic vers un site dans un court délai tout en générant des revenus grâce à Internet. En revanche, avec cette formation, les risques de pénalités seront réduits.</p>
                                            <h4 class="my-3">Les modules qui composent la formation Black Hat Money</h4>
                                            <p>En général, la formation Black Hat Money est composée de plusieurs modules. Ainsi, le stagiaire peut apprendre :</p>
                                            <ul>
                                                <li>Les bases du SEO</li>
                                                <li>Les différentes méthodes pour générer du contenu automatiquement</li>
                                                <li>Le Spamdexing ou spams pour les moteurs de recherche</li>
                                                <li>L’automatisation des sites web avec Zennoposter</li>
                                                <li>Les noms de domaines expirés (expired domain)</li>
                                                <li>Les méthodes pour suroptimiser son site pour gagner en visibilité…</li>
                                                <li>La stratégie de Netlinking et Link building</li>
                                                <li>La monétisation et les différentes stratégies</li>
                                            </ul>
                                            <p>En bref, le référenceur aura des vidéos, des forums ainsi que des outils premium mis à sa disposition pour générer du contenu.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-26">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-26" aria-expanded="false" aria-controls="collapse-26" class="collapsed">SEO Camp</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-26" class="collapse" role="tabpanel" aria-labelledby="heading-26" data-parent="#accordion-26" style="">
                                        <div class="card-body">
                                            <p class="mb-3">SEO Camp est une association française fondée en 2008 rassemblant des spécialistes du référencement, selon la loi 1901. Il s’agit donc d’un événement webmarketing international où sont abordées de nombreuses idées de sujet. Cependant, sachez qu’il est organisé en France depuis 2009 deux journées entièrement dédiées à cet univers.</p>
                                            <p class="my-3">La SMX rassemble la communauté du référencement francophone depuis 2008 tel que les agences SEO, les chercheurs, les responsables et consultants freelance. Passionnés par le référencement, leur groupe prévoit souvent des conférences et des rencontres en France et à l’étranger pour échanger autour du sujet.</p>
                                            <p>Cet événement joue un rôle important dans le domaine de la certification SEO qui est notamment la certification CESEO et QuASEO.</p>
                                            <h4 class="my-3">Pourquoi adhérer à cette association ?</h4>
                                            <p>L’adhésion à cette coopération fera bénéficier aux participants des avantages exclusifs auprès de ses partenaires :</p>
                                            <ul>
                                                <li>Obtenir un prix raisonnable pour tout événement SEO CAMP.</li>
                                                <li>Passer les certifications QUASEO et CESEO : ces certifications sont utiles pour approuver les compétences en référencement.</li>
                                                <li>Soutenir l'association dans ses projets durant l’organisation du SEO Camp’us.</li>
                                                <li>Participer aux ateliers cliniques et participatifs.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-27">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-27" aria-expanded="false" aria-controls="collapse-27" class="collapsed">EMD (exact match domain)</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-27" class="collapse" role="tabpanel" aria-labelledby="heading-27" data-parent="#accordion-27" style="">
                                        <div class="card-body">
                                            <p class="mb-3">EMD ou Exact Match Domain est une technique SEO pour améliorer le positionnement de son site web sur les moteurs de recherche. C’est l’URL de votre site internet, mais avec des mots clés avec lesquels vous voulez optimiser la page web.</p>
                                            <h4 class="my-3">Les EMD et SEO</h4>
                                            <ul>
                                                <li>Le nombre de mots clés présents;</li>
                                                <li>L’extension du nom de domaine;</li>
                                                <li>La page à optimiser doit contenir des contenus pertinents et de qualité;</li>
                                                <li>Les mots d’arrêt et les tirets.</li>
                                            </ul>
                                            <p>De plus, les mots clés dans les EMD ne sont pas forcément nécessaires. Pour obtenir une meilleure position sur le SERP à long terme, optez pour un nom original qui est facile à comprendre par les internautes et bien associé à l’image de marque d’une entreprise</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-28">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-28" aria-expanded="false" aria-controls="collapse-28" class="collapsed">Trust flow</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-28" class="collapse" role="tabpanel" aria-labelledby="heading-28" data-parent="#accordion-28" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Le Trust Flow ou TF est souvent utilisé par les référenceurs spécialistes parce qu’il faut les connaître pour mettre en place une bonne stratégie SEO. C’est un indicateur utilisé pour évaluer l’indice de confiance d’une page web ou d’un site internet. Il est souvent utilisé avec Citation Flow ou CF. Ces deux indicateurs sont des marques déposées par l’outil Majestic SEO.</p>
                                            <h4 class="my-3">L’utilisation complémentaire de ces deux indicateurs réside sur les backlinks: </h4>
                                            <ul>
                                                <li>Trust flow: sur la qualité des backlinks. La valeur numérique est représentée par le nombre de 0 à 100 pour chaque lien;</li>
                                                <li>Citation flow: sur leur quantité.</li>
                                            </ul>
                                            <p>Un lien provenant d’un site internet de confiance ou d’un site d’autorité a la chance de s’attribuer une meilleure note. Contrairement, un lien entrant provenant d’un site considéré comme spam par les moteurs de recherche aura un trust flow faible.</p>
                                            <h4 class="my-3">L’importance des backlinks en référencement naturel</h4>
                                            <p>Un site obtenant plusieurs liens entrants ou backlinks de qualité provenant des sites jugés de confiance ou d’autorité est considéré comme un site pertinent. Cela permet d’améliorer le positionnement de votre site internet sur les moteurs de recherche.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-29">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-29" aria-expanded="false" aria-controls="collapse-29" class="collapsed">Domaine expiré</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-29" class="collapse" role="tabpanel" aria-labelledby="heading-29" data-parent="#accordion-29" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Un domaine expiré est le nom de domaine non renouvelé par son propriétaire après la date d’expiration du contrat. Les raisons de cet abandon de nom de domaine peut être la fin du projet ou que le propriétaire n’a plus le moyen d’effectuer un nouvel enregistrement.</p>
                                            <p>Il est repris par les référenceurs SEO afin de générer du trafic vers un site web, mais il peut également être utilisé dans divers domaines du e-commerce ou du marketing digital. L’usage des noms de domaines expirés sur le domaine du référencement naturel du côté des backlinks ou liens entrants et les mots clés du nom de domaine. </p>
                                            <h4 class="my-3">Les backlinks</h4>
                                            <p>Pour les noms de domaines expirés, les liens retour ou les backlinks regroupent tous les liens pointant vers le site quand il était actif et en cours d’utilisation. Cependant, les contenus ne sont pas repris dans la majorité des cas. Mais les liens entrants peuvent être conservés au cas où le propriétaire en a besoin.</p>
                                            <h4 class="my-3">Les mots clés du nom de domaine</h4>
                                            <p>Un nom de domaine avec des mots clés est le signe qu’il est pertinent aux yeux des moteurs de recherche. Cela permet de générer des visiteurs potentiels.e.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-30">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-30" aria-expanded="false" aria-controls="collapse-30" class="collapsed">Link Building</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-30" class="collapse" role="tabpanel" aria-labelledby="heading-30" data-parent="#accordion-30" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Le link building est le fait de rechercher et de créer les liens externes ou les backlinks. Le but est d’améliorer le positionnement d’un site web sur les résultats de recherche. L’importance des liens entrants en référencement naturel SEO n’est pas à contester puisque plus un site obtient de liens pointant vers lui, plus il est considéré pertinent aux yeux des moteurs de recherche. Cela permet d’être dans la première page des SERPs.</p>
                                            <p>Par ailleurs, les liens doivent respecter certains critères:</p>
                                            <ul>
                                                <li>Privilégier les liens dofollow, mais les liens nofollow sont également nécessaires pour préserver un bon profil de backlinks;</li>
                                                <li>Les backlinks doivent être de qualité. Il est vrai que la quantité est importante, mais les moteurs de recherche, notamment Google privilégie la qualité avant cela;</li>
                                                <li>Les liens provenant d’un site de confiance ou site d’autorité.</li>
                                            </ul>
                                            <p>Le link building est une stratégie SEO off-page. De nombreux moyens peuvent être utilisés pour obtenir des liens venant d’autres pages. Voici les méthodes les plus courantes de link building: </p>
                                            <ul>
                                                <li>Attendre que les visiteurs recommandent votre contenu. Un contenu de qualité génère souvent des visiteurs satisfaits et ils n'hésitent pas à faire l’éloge;</li>
                                                <li>Référer une page web à partir des commentaires sur des blogs; </li>
                                                <li>Effectuer un échange de liens avec d'autres sites web;</li>
                                                <li>Achat de liens.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-31">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-31" aria-expanded="false" aria-controls="collapse-31" class="collapsed">SEO Garden Party</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-31" class="collapse" role="tabpanel" aria-labelledby="heading-31" data-parent="#accordion-31" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Envie d’améliorer vos positions et d’augmenter votre visibilité sur Google ? Pourquoi ne pas participer au SEO Garden Party. Il s’agit d’un événement accessible gratuitement destiné aux amateurs et experts SEO dans le but de leur apprendre les bases du référencement.</p>
                                            <p>SEO Garden Party est le tout premier évènement en ligne organisé pour les webmasters ainsi que les e-commerçants. Cet événement est organisé et sponsorisé par la plateforme de backlinks Linksgarden.com. Il est à noter que cette plateforme enregistre des centaines de spots exclusifs avec différentes thématiques et un service de gestion de projet ainsi qu’une équipe professionnelle à votre écoute.</p>
                                            <h4 class="my-3">Comment se déroule cet événement?</h4>
                                            <p>Cet événement se déroule chaque année sous la tutelle de 6 experts SEO. Cependant, les intervenants changent également chaque année. Ces experts SEO confirmés vont partager avec vous leur expérience en matière de référencement notamment en Netlinking afin de vous aider à augmenter votre chiffre d’affaires. Chaque conférencier fera une présentation de 10 à 15 minutes pour répondre à vos questions.</p>
                                            <p>Des programmes à la carte sont à proposer, alors à vous de choisir celle qui répond à vos besoins. Pour participer à l’événement, vous devez réserver votre place sur seogardenparty.com. Un mail vous sera envoyé à la suite de votre réservation. En effet, au vu du nombre de places limitées, l’inscription est obligatoire.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-32">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-32" aria-expanded="false" aria-controls="collapse-32" class="collapsed">SEO By night</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-32" class="collapse" role="tabpanel" aria-labelledby="heading-32" data-parent="#accordion-32" style="">
                                        <div class="card-body">
                                            <p class="mb-3">SEO By night est un événement marketing digital basé sur les techniques du référencement naturel. Il s’adresse à tous les porteurs de projets, consultants, e-commerçants, créateurs de start-ups, porteurs de projet ou entrepreneurs qui veulent découvrir les toutes dernières tendances en matière de SEO.</p>
                                            <p>Pendant toute une journée, des conférenciers professionnels exposeront les techniques et stratégies à adopter pour développer votre business.</p>
                                            <p>Tout cela dans le but de faire profiter à ces professionnels une expérience numérique hors du commun avec les 12 plus grands experts en webmarketing et communication digitale. Si vous n’aviez pas eu l’occasion d’y assister, cet événement survient tous les ans.</p>
                                            <h4 class="my-3">Des animations intéressantes sont au rendez-vous</h4>
                                            <p>Grâce aux échanges et aux diverses animations, les participants auront l’opportunité de poser des questions sur les sujets qui les intéressent pendant l’événement afin de d’enrichir leur compétence dans le domaine.</p>
                                            <h4 class="my-3">Des experts de haut niveau à votre disposition</h4>
                                            <p>Les organisateurs de SEO by Night ont sélectionné minutieusement les conférenciers qui y seront présents durant l’événement. Que ce soit dans le domaine de la sémantique, du netlinking ou autre lié au référencement naturel, avec les experts qualifiés vous serez servis. Ils seront ravis de partager avec vous leurs savoir-faire et expériences. Après la conférence, devenez-vous aussi, un expert en référencement.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-33">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-33" aria-expanded="false" aria-controls="collapse-33" class="collapsed">Kifdom</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-33" class="collapse" role="tabpanel" aria-labelledby="heading-33" data-parent="#accordion-33" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Vous avez envie de récupérer des noms de domaines expirés en .fr? La meilleure solution est d'utiliser KifDom. Un site qui propose plusieurs noms de domaines expirés. Son fonctionnement est simple: les clients arrivent sur le site et consultent la liste des noms de domaine disponibles qui vont se libérer prochainement ou pré recommandés. Au cas où plus de deux personnes ont réservé un nom de domaine expiré, ce dernier va être mis aux enchères.</p>
                                            <h4 class="my-3">Les avantages de KifDom</h4>
                                            <p>Vous avez à votre disposition une longue liste de noms de domaine. Le plus c’est que vous pouvez la filtrer en fonction de métriques SEO. C’est à vous de voir celui qui va propulser votre site web.</p>
                                            <p>Le rapport qualité-prix est au rendez-vous parce que vous avez la possibilité d’avoir un nom de domaine avec un meilleur métrique SEO à un prix abordable. Alors que les autres sites en proposent à un prix élevé.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-34">
                                        <h4 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-34" aria-expanded="false" aria-controls="collapse-34" class="collapsed">PBN (private blog network)</a>
                                        </h4>
                                      </div>
                                      <div id="collapse-34" class="collapse" role="tabpanel" aria-labelledby="heading-34" data-parent="#accordion-34" style="">
                                        <div class="card-body">
                                            <p class="mb-3">Le PBN ou private network blog est un réseau de blogs reliés à un site web principal. Le but est d’améliorer le positionnement du site principal sur les moteurs de recherche grâce au maillage interne. Même si cela permet d’améliorer la visibilité d’un site sur le web, le PBN est une pratique SEO Black hat et interdite par Google. Cependant, de nombreux référenceurs ont quand même recours à cette technique. Il existe deux types de PBN qui sont PBN pauvre en contenus et PBN riche en contenus.</p>
                                            <h4 class="my-3">PBN pauvre en contenus</h4>
                                            <p>C’est le type de site utilisé par les référenceurs Black Hat qui sont à la recherche d’un résultat à court terme. L’objectif est d’augmenter le trafic vers le site principal cible même si les contenus sont de mauvaise qualité.</p>
                                            <p>Les sites PBN proviennent parfois d’un système d’automatisation ou à partir d’un nom de domaine expiré et de même pour les contenus. Les référenceurs ont un seul et unique but, obtenir le link juice.</p>
                                            <h4 class="my-3">PBN riche en contenus</h4>
                                            <p>Ce type de site contient des contenus de qualité qui vont plaire aux visiteurs et non pas aux robots des moteurs de recherche. Le site PBN peut provenir même d’un nouveau nom de domaine.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.nav-item').removeClass('active');
            $('#dictionnaire_tab').addClass('active');
        });
    </script>
@endsection
