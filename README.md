# 🪙 Plugin Coin Exchange - MUCRM

Sistema de troca de moedas desenvolvido exclusivamente para a **MUCRM**.

---

# 📜 Licença

Este plugin é de uso **exclusivo para clientes e usuários da MUCRM**.

### ❗ Restrições

* Proibida a revenda do plugin.
* Proibida a redistribuição em fóruns, grupos ou sites de terceiros.
* Proibido remover créditos ou reivindicar autoria.
* O uso é permitido somente em projetos que utilizem a plataforma **MUCRM**.

Todos os direitos reservados.

---

# 📦 Instalação

## 1. Baixe o arquivo

Baixe o plugin em formato `.zip`.

## 2. Extraia os arquivos

Extraia todo o conteúdo na pasta raiz do seu site/hospedagem.

---

# ⚙️ Configuração

## Arquivo

```
bootstrap/config/user.php
```

Adicione no final do array:

```php
'exchange' => [
    'active' => true, // Ativar ou desativar (true = ativo, false = desativado)
    'coin_discount' => 0, // Moeda que será descontada
    'coin_receive' => 1, // Moeda que será recebida
    'quantity_remove' => 1, // Quantidade a descontar
    'quantity_receive' => 1 // Quantidade recebida na troca
]
```

---

# 🌎 Traduções

## Diretório

```
resources/lang/
```

Adicionar em:

* `en/user.php`
* `es/user.php`
* `pt/user.php`

---

## 🇺🇸 Inglês (en/user.php)

```php
'exchange' => [
    'title' => 'Coin Exchange',
    'info_note' => 'For every :remove_qty :remove_name, you will receive :receive_qty :receive_name.',
    'input_label' => 'Enter the quantity',
    'submit_button' => 'Confirm Exchange',
    'required_quantity' => 'The field must be filled.',
    'integer_quantity'  => 'The quantity must be an integer.',
    'min_quantity'      => 'The minimum quantity for exchange is 1.',
    'invalid_config'    => 'Incomplete or identical configuration.',
    'insufficient_balance' => 'You do not have :total_discount :coin_name to make this exchange.',
    'trade_success'     => 'Exchange completed successfully! You received :total_receive :coin_name.',
]
```

---

## 🇪🇸 Espanhol (es/user.php)

```php
'exchange' => [
    'title' => 'Intercambio de Monedas',
    'info_note' => 'Por cada :remove_qty :remove_name, recibirás :receive_qty :receive_name.',
    'input_label' => 'Ingrese la cantidad',
    'submit_button' => 'Confirmar Intercambio',
    'required_quantity' => 'El campo debe ser completado.',
    'integer_quantity'  => 'La cantidad debe ser un número entero.',
    'min_quantity'      => 'La cantidad mínima para el intercambio es 1.',
    'invalid_config'    => 'Configuración incompleta o idéntica.',
    'insufficient_balance' => 'No tienes :total_discount :coin_name para realizar este intercambio.',
    'trade_success'     => '¡Intercambio realizado con éxito! Recibiste :total_receive :coin_name.',
]
```

---

## 🇧🇷 Português (pt/user.php)

```php
'exchange' => [
    'title' => 'Troca de Moedas',
    'info_note' => 'A cada :remove_qty :remove_name, você receberá :receive_qty :receive_name.',
    'input_label' => 'Digite a quantidade',
    'submit_button' => 'Confirmar Troca',
    'required_quantity' => 'O campo precisa ser preenchido.',
    'integer_quantity'  => 'A quantidade precisa ser um número inteiro.',
    'min_quantity'      => 'A quantidade mínima para troca é 1.',
    'invalid_config'    => 'Configuração incompleta ou idêntica.',
    'insufficient_balance' => 'Você não possui :total_discount :coin_name para realizar essa troca.',
    'trade_success'     => 'Troca realizada com sucesso! Você recebeu :total_receive :coin_name.',
]
```

---

# 📋 Adicionando ao Menu Lateral

Arquivo:

```
resources/default/component/web/sidebar.mucrm.php
```

Adicione abaixo da linha **48**:

```html
@if(config('user.exchange.active'))
    <li>
        <a href="{{ route('plugins.coin.index') }}"
            class="flex items-center gap-3 px-3 py-2 text-sm text-zinc-300 hover:text-white hover:bg-white/5 rounded-lg transition-all group">

            <i data-lucide="coins"
            class="w-4 h-4 text-zinc-500 group-hover:text-zinc-400"></i>

            <span class="font-semibold">
                {{ __lang('user.exchange.title') }}
            </span>

        </a>
    </li>
@endif
```

---

# ✅ Recursos

* Sistema de troca de moedas.
* Configuração totalmente personalizada.
* Suporte a múltiplos idiomas.
* Integração nativa com MUCRM.
* Interface integrada ao menu lateral.
* Validação automática de saldo.
* Sistema simples e leve.

---

# 👨‍💻 Desenvolvido para MUCRM

Plugin criado para expandir os recursos da plataforma **MUCRM**, oferecendo uma maneira simples e eficiente de realizar trocas entre moedas dentro do sistema.

**Versão:** 1.0.0
