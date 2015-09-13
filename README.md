# Ordination
[![Latest Stable Version](https://poser.pugx.org/laraerp/ordination/v/stable)](https://packagist.org/packages/laraerp/ordination) [![Total Downloads](https://poser.pugx.org/laraerp/ordination/downloads)](https://packagist.org/packages/laraerp/ordination) [![Latest Unstable Version](https://poser.pugx.org/laraerp/ordination/v/unstable)](https://packagist.org/packages/laraerp/ordination) [![License](https://poser.pugx.org/laraerp/ordination/license)](https://packagist.org/packages/laraerp/ordination)

Adiciona ao model Eloquent o recurso de ordenar consulta por models relacionados.

Exemplo:

```php
$clientes = Cliente::orderBy('pessoa.nome', 'desc')->get();
```

### Como utilizar

Adicione a library

```sh
$ composer require laraerp/ordination
```

Adicione o ServiceProvider no arquivo `config/app.php`

```php
// file START ommited
    'providers' => [
        // other providers ommited
        \Laraerp\Ordination\OrdinationServiceProvider::class,
    ],
    
    'aliases' => [
        // other aliases ommited
        'Order' => Laraerp\Ordination\Facade::class,
    ],
    
// file END ommited
```

Adicione a trait `OrdinationTrait` no model:

```php
use Laraerp\Ordination\OrdinarionTrait;

class Cliente extends Model{

  use OrdinarionTrait;
  
  /*
   * Belong To Pessoa
   */
  public function pessoa(){
      return $this->belongsTo(Pessoa::class);
  }

}
```

### Order::url()

Utilize o helper na sua view para gerar um link de ordenação:

```html
<thead>
  <tr>
      <th><a href="{{Order::url('pessoa.documento')}}">Documento</a></th>
      <th><a href="{{Order::url('pessoa.nome')}}">Cliente</a></th>
  </tr>
</thead>
```

### License

The MIT License (MIT)
