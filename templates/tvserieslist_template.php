{ "collection" :
    {
        "title" : "TV Series Database",
            "type" : "tvseries",
            "version" : "1.0",
            "href" : "{{ path_for('tvseries')}}",

            "links" : [
              {"rel" : "profile" , "href" : "http://schema.org/TVSeries","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"},
                {"rel" : "collection", "href" : "{{ path_for('tvseries') }}","prompt":"TV Series"}
            ],

            "items" : [
                {% for item in items %}

                {
                    "href" : "{{ path_for('tvseries') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la serie de TV"}
                        ]
                        } {% if not loop.last %},{% endif %}

                {% endfor %}

            ],

            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre de la serie de TV"},
                {"name" : "description", "value" : "", "prompt" : "Descripción de la serie de TV"},
                {"name" : "creator", "value" : "", "prompt" : "Creador de la serie de TV"},
                {"name" : "seasons", "value" : "", "prompt" : "Temporadas de la serie de TV"},
                {"name" : "episodes", "value" : "", "prompt" : "Número de episodios de la serie de TV"},
                {"name" : "dateReleaseFirst", "value" : "", "prompt" : "Fecha de emisión primer episodio"},
                {"name" : "dateReleaseLast", "value" : "", "prompt" : "Fecha de emisión último episodio"},
                {"name" : "embedUrl", "value" : "", "prompt" : "Trailer en Youtube"}
            ]
                }
    }
}




