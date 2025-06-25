// Funcionalidad completa para el directorio de organizaciones
document.addEventListener('DOMContentLoaded', function() {
    // Referencias a elementos del DOM
    const filtroTipoOrganizacion = document.getElementById('filtroTipoOrganizacion');
    const filtroUbicacion = document.getElementById('filtroUbicacion');
    const busqueda = document.getElementById('busqueda');
    const directorioContainer = document.getElementById('directorioOrganizaciones');
    const contadorTotal = document.querySelector('.badge.bg-dark');
    
    // Variables para paginación
    let paginaActual = 1;
    const elementosPorPagina = 6;
    let organizacionesFiltradas = [];
    
    // Datos originales de las organizaciones
    const organizacionesOriginales = [
        {
            nombre: 'Comedor Santa María',
            ruc: '20123456789',
            ubicacion: 'San Juan de Lurigancho',
            zona: 'este',
            descripcion: 'Brindamos alimentación diaria a 150 familias de bajos recursos en la zona.',
            tipo: 'comedor',
            tipoBadge: 'Comedor Popular',
            badgeClass: 'bg-primary',
            estadistica: '150 familias atendidas',
            icono: 'fas fa-users'
        },
        {
            nombre: 'Albergue Esperanza',
            ruc: '20234567890',
            ubicacion: 'Cercado de Lima',
            zona: 'lima',
            descripcion: 'Refugio temporal para personas en situación de calle con servicios básicos.',
            tipo: 'albergue',
            tipoBadge: 'Albergue',
            badgeClass: 'bg-success',
            estadistica: '80 camas disponibles',
            icono: 'fas fa-bed'
        },
        {
            nombre: 'Centro de Salud Comunitario',
            ruc: '20345678901',
            ubicacion: 'Villa El Salvador',
            zona: 'sur',
            descripcion: 'Atención médica primaria gratuita para la comunidad de Villa El Salvador.',
            tipo: 'salud',
            tipoBadge: 'Centro de Salud',
            badgeClass: 'bg-danger',
            estadistica: '200 consultas/mes',
            icono: 'fas fa-heartbeat'
        },
        {
            nombre: 'Escuela Primaria Los Ángeles',
            ruc: '20456789012',
            ubicacion: 'Ate',
            zona: 'este',
            descripcion: 'Educación primaria gratuita para niños de la comunidad de Ate.',
            tipo: 'escuela',
            tipoBadge: 'Institución Educativa',
            badgeClass: 'bg-info',
            estadistica: '200 estudiantes',
            icono: 'fas fa-graduation-cap'
        },
        {
            nombre: 'Hogar de Niños San José',
            ruc: '20567890123',
            ubicacion: 'Callao',
            zona: 'callao',
            descripcion: 'Hogar de acogida para niños en situación de vulnerabilidad.',
            tipo: 'fundacion',
            tipoBadge: 'Fundación',
            badgeClass: 'bg-warning text-dark',
            estadistica: '50 niños acogidos',
            icono: 'fas fa-child'
        },
        {
            nombre: 'Albergue Mujeres en Acción',
            ruc: '20678901234',
            ubicacion: 'La Victoria',
            zona: 'lima',
            descripcion: 'Refugio especializado para mujeres en situación de violencia.',
            tipo: 'albergue',
            tipoBadge: 'Albergue',
            badgeClass: 'bg-success',
            estadistica: '24h protección',
            icono: 'fas fa-shield-alt'
        },
        // Datos adicionales para demostrar paginación
        {
            nombre: 'Biblioteca Comunitaria',
            ruc: '20789012345',
            ubicacion: 'San Martín de Porres',
            zona: 'norte',
            descripcion: 'Espacio de lectura y estudio gratuito para estudiantes de todas las edades.',
            tipo: 'otros',
            tipoBadge: 'Centro Cultural',
            badgeClass: 'bg-secondary',
            estadistica: '500 visitantes/mes',
            icono: 'fas fa-book'
        },
        {
            nombre: 'Casa Cuna Municipal',
            ruc: '20890123456',
            ubicacion: 'Miraflores',
            zona: 'lima',
            descripcion: 'Cuidado y protección de bebés y niños pequeños en situación de abandono.',
            tipo: 'fundacion',
            tipoBadge: 'Fundación',
            badgeClass: 'bg-warning text-dark',
            estadistica: '30 niños cuidados',
            icono: 'fas fa-baby'
        },
        {
            nombre: 'Comedor Los Olivos',
            ruc: '20901234567',
            ubicacion: 'Los Olivos',
            zona: 'norte',
            descripcion: 'Alimentación comunitaria para familias de bajos recursos en Los Olivos.',
            tipo: 'comedor',
            tipoBadge: 'Comedor Popular',
            badgeClass: 'bg-primary',
            estadistica: '120 familias atendidas',
            icono: 'fas fa-users'
        },
        {
            nombre: 'Centro de Rehabilitación Vida Nueva',
            ruc: '21012345678',
            ubicacion: 'Villa María del Triunfo',
            zona: 'sur',
            descripcion: 'Programa de rehabilitación para personas con adicciones.',
            tipo: 'salud',
            tipoBadge: 'Centro de Salud',
            badgeClass: 'bg-danger',
            estadistica: '40 pacientes',
            icono: 'fas fa-heart'
        },
        {
            nombre: 'Colegio Técnico San Pedro',
            ruc: '21123456789',
            ubicacion: 'Ventanilla',
            zona: 'callao',
            descripcion: 'Educación técnica gratuita para jóvenes de bajos recursos.',
            tipo: 'escuela',
            tipoBadge: 'Institución Educativa',
            badgeClass: 'bg-info',
            estadistica: '300 estudiantes',
            icono: 'fas fa-tools'
        },
        {
            nombre: 'Fundación Esperanza Infantil',
            ruc: '21234567890',
            ubicacion: 'Chorrillos',
            zona: 'sur',
            descripcion: 'Apoyo integral a niños con enfermedades graves y sus familias.',
            tipo: 'fundacion',
            tipoBadge: 'Fundación',
            badgeClass: 'bg-warning text-dark',
            estadistica: '80 niños apoyados',
            icono: 'fas fa-hands-helping'
        },
        {
            nombre: 'Albergue Temporal Puente',
            ruc: '21345678901',
            ubicacion: 'Rímac',
            zona: 'lima',
            descripcion: 'Refugio temporal para personas damnificadas por desastres naturales.',
            tipo: 'albergue',
            tipoBadge: 'Albergue',
            badgeClass: 'bg-success',
            estadistica: '100 camas emergencia',
            icono: 'fas fa-home'
        },
        {
            nombre: 'Centro Comunitario Integración',
            ruc: '21456789012',
            ubicacion: 'Carabayllo',
            zona: 'norte',
            descripcion: 'Actividades recreativas y educativas para toda la familia.',
            tipo: 'otros',
            tipoBadge: 'Centro Comunitario',
            badgeClass: 'bg-secondary',
            estadistica: '200 familias participan',
            icono: 'fas fa-users'
        },
        {
            nombre: 'Dispensario Médico Santa Rosa',
            ruc: '21567890123',
            ubicacion: 'San Juan de Miraflores',
            zona: 'sur',
            descripcion: 'Atención médica básica y medicamentos a precios solidarios.',
            tipo: 'salud',
            tipoBadge: 'Dispensario',
            badgeClass: 'bg-danger',
            estadistica: '150 consultas/mes',
            icono: 'fas fa-stethoscope'
        }
    ];

    // Inicializar
    organizacionesFiltradas = [...organizacionesOriginales];
    mostrarOrganizaciones();
    actualizarPaginacion();

    // Event listeners para filtros
    filtroTipoOrganizacion.addEventListener('change', aplicarFiltros);
    filtroUbicacion.addEventListener('change', aplicarFiltros);
    busqueda.addEventListener('input', aplicarFiltros);

    // Función principal para aplicar filtros
    function aplicarFiltros() {
        const tipo = filtroTipoOrganizacion.value;
        const zona = filtroUbicacion.value;
        const textoBusqueda = busqueda.value.toLowerCase().trim();

        organizacionesFiltradas = organizacionesOriginales.filter(organizacion => {
            // Filtro por tipo de organización
            const pasaTipo = !tipo || organizacion.tipo === tipo;
            
            // Filtro por zona/ubicación
            const pasaZona = !zona || organizacion.zona === zona;
            
            // Filtro por búsqueda de texto
            const pasaBusqueda = !textoBusqueda || 
                organizacion.nombre.toLowerCase().includes(textoBusqueda) ||
                organizacion.ruc.includes(textoBusqueda) ||
                organizacion.ubicacion.toLowerCase().includes(textoBusqueda) ||
                organizacion.descripcion.toLowerCase().includes(textoBusqueda) ||
                organizacion.tipoBadge.toLowerCase().includes(textoBusqueda);

            return pasaTipo && pasaZona && pasaBusqueda;
        });

        paginaActual = 1; // Resetear a primera página
        mostrarOrganizaciones();
        actualizarPaginacion();
        actualizarContador();
    }

    // Función para mostrar las organizaciones
    function mostrarOrganizaciones() {
        const inicio = (paginaActual - 1) * elementosPorPagina;
        const fin = inicio + elementosPorPagina;
        const organizacionesPagina = organizacionesFiltradas.slice(inicio, fin);

        directorioContainer.innerHTML = '';

        if (organizacionesPagina.length === 0) {
            directorioContainer.innerHTML = `
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <h4>No se encontraron resultados</h4>
                        <p>No hay organizaciones que coincidan con los filtros seleccionados.</p>
                        <button class="btn btn-warning" onclick="limpiarFiltros()">Limpiar Filtros</button>
                    </div>
                </div>
            `;
            return;
        }

        organizacionesPagina.forEach(organizacion => {
            const card = crearCardOrganizacion(organizacion);
            directorioContainer.appendChild(card);
        });
    }

    // Función para crear una card de organización
    function crearCardOrganizacion(organizacion) {
        const col = document.createElement('div');
        col.className = 'col-lg-4 col-md-6';

        col.innerHTML = `
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">${organizacion.nombre}</h5>
                        <span class="badge ${organizacion.badgeClass}">${organizacion.tipoBadge}</span>
                    </div>
                    <p class="card-text mb-2"><strong>RUC:</strong> ${organizacion.ruc}</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> ${organizacion.ubicacion}</p>
                    <p class="card-text text-muted mb-3">${organizacion.descripcion}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="${organizacion.icono}"></i> ${organizacion.estadistica}
                        </small>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm" onclick="verDetalles('${organizacion.nombre}')">
                                <i class="fas fa-eye"></i> Ver más
                            </button>
                            <button class="btn btn-warning btn-sm text-dark" onclick="contactarOrganizacion('${organizacion.nombre}')">
                                <i class="fas fa-envelope"></i> Contactar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        return col;
    }

    // Función para actualizar la paginación
    function actualizarPaginacion() {
        const totalPaginas = Math.ceil(organizacionesFiltradas.length / elementosPorPagina);
        const paginacion = document.querySelector('.pagination');

        if (totalPaginas <= 1) {
            paginacion.parentElement.style.display = 'none';
            return;
        }

        paginacion.parentElement.style.display = 'block';
        paginacion.innerHTML = '';

        // Botón Anterior
        const anteriorLi = document.createElement('li');
        anteriorLi.className = `page-item ${paginaActual === 1 ? 'disabled' : ''}`;
        anteriorLi.innerHTML = `<a class="page-link" href="#" data-pagina="${paginaActual - 1}">Anterior</a>`;
        paginacion.appendChild(anteriorLi);

        // Números de página
        for (let i = 1; i <= totalPaginas; i++) {
            const li = document.createElement('li');
            li.className = `page-item ${i === paginaActual ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="#" data-pagina="${i}">${i}</a>`;
            paginacion.appendChild(li);
        }

        // Botón Siguiente
        const siguienteLi = document.createElement('li');
        siguienteLi.className = `page-item ${paginaActual === totalPaginas ? 'disabled' : ''}`;
        siguienteLi.innerHTML = `<a class="page-link" href="#" data-pagina="${paginaActual + 1}">Siguiente</a>`;
        paginacion.appendChild(siguienteLi);

        // Event listeners para paginación
        paginacion.addEventListener('click', function(e) {
            e.preventDefault();
            const pagina = parseInt(e.target.dataset.pagina);
            
            if (pagina && pagina !== paginaActual && pagina >= 1 && pagina <= totalPaginas) {
                paginaActual = pagina;
                mostrarOrganizaciones();
                actualizarPaginacion();
                // Scroll al inicio del directorio
                directorioContainer.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Función para actualizar el contador
    function actualizarContador() {
        contadorTotal.textContent = `Total: ${organizacionesFiltradas.length} organizaciones`;
    }

    // Función para limpiar filtros (disponible globalmente)
    window.limpiarFiltros = function() {
        filtroTipoOrganizacion.value = '';
        filtroUbicacion.value = '';
        busqueda.value = '';
        aplicarFiltros();
    };

    // Función para ver detalles de organización (disponible globalmente)
    window.verDetalles = function(nombre) {
        // Buscar la organización en los datos
        const organizacion = organizacionesOriginales.find(org => org.nombre === nombre);
        
        if (organizacion) {
            // Crear modal con información detallada
            const modalHtml = `
                <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="modalDetallesLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDetallesLabel">${organizacion.nombre}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold">Información General</h6>
                                        <p><strong>RUC:</strong> ${organizacion.ruc}</p>
                                        <p><strong>Tipo:</strong> ${organizacion.tipoBadge}</p>
                                        <p><strong>Ubicación:</strong> ${organizacion.ubicacion}</p>
                                        <p><strong>Impacto:</strong> ${organizacion.estadistica}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold">Descripción</h6>
                                        <p>${organizacion.descripcion}</p>
                                        <div class="mt-3">
                                            <span class="badge ${organizacion.badgeClass} me-2">${organizacion.tipoBadge}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-warning" onclick="contactarOrganizacion('${organizacion.nombre}')">
                                    <i class="fas fa-envelope"></i> Contactar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Eliminar modal existente si existe
            const modalExistente = document.getElementById('modalDetalles');
            if (modalExistente) {
                modalExistente.remove();
            }
            
            // Agregar modal al DOM
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            
            // Mostrar modal
            const modal = new bootstrap.Modal(document.getElementById('modalDetalles'));
            modal.show();
        }
    };

    // Función para contactar organización (disponible globalmente)
    window.contactarOrganizacion = function(nombre) {
        // Buscar la organización en los datos
        const organizacion = organizacionesOriginales.find(org => org.nombre === nombre);
        
        if (organizacion) {
            // Crear modal de contacto
            const modalContactoHtml = `
                <div class="modal fade" id="modalContacto" tabindex="-1" aria-labelledby="modalContactoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalContactoLabel">Contactar a ${organizacion.nombre}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formContacto">
                                    <div class="mb-3">
                                        <label for="nombreContacto" class="form-label">Tu nombre</label>
                                        <input type="text" class="form-control" id="nombreContacto" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailContacto" class="form-label">Tu email</label>
                                        <input type="email" class="form-control" id="emailContacto" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefonoContacto" class="form-label">Tu teléfono</label>
                                        <input type="tel" class="form-control" id="telefonoContacto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="motivoContacto" class="form-label">Motivo del contacto</label>
                                        <select class="form-select" id="motivoContacto" required>
                                            <option value="">Selecciona un motivo</option>
                                            <option value="donacion">Quiero hacer una donación</option>
                                            <option value="voluntariado">Quiero ser voluntario</option>
                                            <option value="colaboracion">Propuesta de colaboración</option>
                                            <option value="informacion">Solicitar información</option>
                                            <option value="otro">Otro motivo</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mensajeContacto" class="form-label">Mensaje</label>
                                        <textarea class="form-control" id="mensajeContacto" rows="4" required></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-warning" onclick="enviarContacto('${organizacion.nombre}')">
                                    <i class="fas fa-paper-plane"></i> Enviar Mensaje
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Eliminar modal existente si existe
            const modalExistente = document.getElementById('modalContacto');
            if (modalExistente) {
                modalExistente.remove();
            }
            
            // Agregar modal al DOM
            document.body.insertAdjacentHTML('beforeend', modalContactoHtml);
            
            // Mostrar modal
            const modal = new bootstrap.Modal(document.getElementById('modalContacto'));
            modal.show();
        }
    };

    // Función para enviar contacto (disponible globalmente)
    window.enviarContacto = function(nombreOrganizacion) {
        const form = document.getElementById('formContacto');
        
        if (form.checkValidity()) {
            const datos = {
                nombre: document.getElementById('nombreContacto').value,
                email: document.getElementById('emailContacto').value,
                telefono: document.getElementById('telefonoContacto').value,
                motivo: document.getElementById('motivoContacto').value,
                mensaje: document.getElementById('mensajeContacto').value,
                organizacion: nombreOrganizacion
            };
            
            // Aquí se implementaría el envío real del formulario
            console.log('Datos de contacto:', datos);
            
            // Simular envío exitoso
            alert(`Mensaje enviado exitosamente a ${nombreOrganizacion}.\n\nTe contactarán pronto a través de tu email.`);
            
            // Cerrar modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('modalContacto'));
            modal.hide();
        } else {
            // Mostrar errores de validación
            form.reportValidity();
        }
    };

    // Manejo del Enter en el campo de búsqueda
    busqueda.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            aplicarFiltros();
        }
    });

    // Funcionalidad adicional: ordenamiento
    function agregarOrdenamiento() {
        const sectionFiltros = document.querySelector('.bg-light .container .row');
       
        
        // Event listeners para ordenamiento
        document.querySelectorAll('input[name="ordenamiento"]').forEach(radio => {
            radio.addEventListener('change', function() {
                ordenarOrganizaciones(this.value);
            });
        });
    }

    // Función para ordenar organizaciones
    function ordenarOrganizaciones(criterio) {
        switch(criterio) {
            case 'nombre':
                organizacionesFiltradas.sort((a, b) => a.nombre.localeCompare(b.nombre));
                break;
            case 'tipo':
                organizacionesFiltradas.sort((a, b) => a.tipoBadge.localeCompare(b.tipoBadge));
                break;
            case 'ubicacion':
                organizacionesFiltradas.sort((a, b) => a.ubicacion.localeCompare(b.ubicacion));
                break;
        }
        
        paginaActual = 1;
        mostrarOrganizaciones();
        actualizarPaginacion();
    }

    // Inicializar funcionalidades adicionales
    agregarOrdenamiento();
    actualizarContador();
});