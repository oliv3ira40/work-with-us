$(function()
{

    var curriculum = $('.curriculum');
    if (curriculum.length) {
        curriculum.dropify({
            messages: {
                'default': 'Arraste e solte seu curriculo aqui ou clique aqui',
                'replace': 'Arraste e solte ou clique para substituir',
                'remove': 'Remover curriculo',
                'error': 'Opa, algo errado foi acrescentado.'
            },
            error: {
                'fileSize': 'O tamanho do arquivo é muito grande (2M max).'
            }
        });
    }

    var profile_picture = $('.profile_picture');
    if (profile_picture.length) {
        profile_picture.dropify({
            messages: {
                'default': 'Arraste e solte sua foto aqui ou clique aqui',
                'replace': 'Arraste e solte ou clique para substituir',
                'remove': 'Remover foto',
                'error': 'Opa, algo errado foi acrescentado.'
            },
            error: {
                'fileSize': 'O tamanho do arquivo é muito grande (2M max).'
            }
        });
    }

});