# Apache-header-authorization-fix

### config/service.conf 

```
service:
//
  fix_authentication_header_listener:
        class: App\Listener\AuthenticationHeaderListener
        tags:
            - { name: kernel.event_listener, event: kernel.request, method: onKernelRequest, priority: 255 }
```
