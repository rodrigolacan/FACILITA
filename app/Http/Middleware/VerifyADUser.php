<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use LdapRecord\Connection;
use LdapRecord\Auth\BindException as BindExecpt;

class VerifyADUser
{
    /**
     * Handle an incoming request.
     * Doc:https://ldaprecord.com/docs/core/v3/
     * 
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Se o parâmetro 'code' estiver presente, permita a passagem
        if ($request->query('code')) {
            return $next($request);
        }

        // Se for uma requisição GET
        if ($request->isMethod('GET')) {
            // Se não houver cookie 'CID', redireciona para a página de login
            if (!$request->hasCookie('CID')) {
                return redirect()->route('Login');
            }

            // Se houver o cookie 'CID', permita a passagem
            return $next($request);
        }

        // Se for uma requisição POST
        if ($request->isMethod('POST')) {
            // Se houver o cookie 'CID', permita a passagem
            if ($request->hasCookie('CID')) {
                return $next($request);
            }

            // Se não houver o cookie 'CID', autenticar e criar o cookie
            $config = [
                'hosts' => [getenv('LDAP_HOSTS')], // Host do servidor LDAP
                'port' => getenv('LDAP_PORT'), // Porta do servidor LDAP (geralmente 389 para LDAP, 636 para LDAPS)
                'base_dn' => getenv('LDAP_BSDN'), // Base DN do seu domínio AD
                'username' => getenv('LDAP_USERNAME'), // Nome de usuário com permissão para fazer consultas no AD
                'password' => getenv('LDAP_PASSWORD'), // Senha do usuário LDAP
                'use_ssl' => false, // Define se a conexão deve usar SSL (LDAPS)
                'use_tls' => false, // Define se a conexão deve usar TLS
            ];

            try {
                $connection = new Connection($config);
                $name = $request->username . '@rr.sebrae.corp';
                $password = $request->password;
                if (!$connection->auth()->attempt($name, strval($password))) {
                    return redirect()->route('Login')->withErrors(['INVALID_USER' => 'Usuário ou senha incorretos']);
                }

                Cookie::queue('CID', strval($request->username), 60);
                session(['USR' => $request->username]);
                return $next($request);
            } catch (BindExecpt $e) {
                return redirect()->route('Login')->withErrors(['LDAP_ERROR' => 'Impossível se conectar ao servidor']);
            }
        }

        // Caso nenhuma das condições anteriores seja atendida, bloqueia o acesso
        return redirect()->route('Login');
    }
}
