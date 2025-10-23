<div class="content">
    <div class="container">
        <div class="card">
            <form class="needs-validations" method="post" novalidate>
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 text-center text-lg-left">
                                <h4 class="mt-3">Agregar Administrador</h4>
                            </div>

                            <div class="col-12 col-lg-6 mt-2 d-none d-lg-block">
                                <button type="submit" class="btn border-0 bg-principal float-right py-2 px-3 btn-sm rounded-pill">Registrar</button>

                                <a href="/admin/administradores" class="btn btn-sm btn-default float-right py-2 px-3 mr-2 rounded-pill">Regresar</a>
                            </div>

                            <div class="col-12 text-center d-flex justify-content-center mt-2 d-block d-lg-none">
                                <div>
                                    <a href="/admin/administradores" class="btn btn-xs btn-default py-2 px-3 rounded-pill mr-2">Regresar</a>
                                </div>

                                <div>
                                    <button class="btn border-0 bg-principal py-2 px-3 btn-xs rounded-pill" type="submit">Registrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-2">
                        <!-- bloque izquierdo -->
                        <div class="col">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group pb-3">
                                        <label for="nombre_administrador">Nombre <sup class="text-danger font-weight-bold">*</sup> </label>
                                        <input type="text" name="nombre_administrador" id="nombre_administrador" 
                                        placeholder= "ingresa tu nombre"
                                        class="form-control" required>
                                        <div class="valid-feedback">Válido</div>
                                        <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="rol_administrador">Rol <sup class="text-danger font-weight-bold">*</sup> </label>
                                        <select name="rol_administrador" id="rol_administrador" class="form-control" required>
                                            <option value="">Elije un rol</option>
                                            <option value="administrador">Administrador</option>
                                            <option value="editor">Editor</option>
                                        </select>
                                        <div class="valid-feedback">Válido</div>
                                        <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Bloque derecho -->
                        <div class="col">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group pb-3">
                                        <label for="email_administrador">Email <sup class="text-danger font-weight-bold">*</sup> </label>
                                        <input type="email" name="email_administrador" id="email_administrador" 
                                        placeholder= "example@email.com"
                                        class="form-control" required>
                                        <div class="valid-feedback">Válido</div>
                                        <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="password_administrador">Password <sup class="text-danger font-weight-bold">*</sup> </label>
                                        <input type="password" name="password_administrador" id="password_administrador" 
                                        placeholder= "ingresa contraseña" class="form-control" required>
                                        <div class="valid-feedback">Válido</div>
                                        <div class="invalid-feedback">Por favor llene este campo correctamente</div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 text-center text-lg-left mt-lg-3">
                                <label class="font-weight-light">
                                    <sup class="text-danger">*</sup>Campos obligatorios
                                </label>
                            </div>

                            <div class="col-12 col-lg-6 mt-2 d-none d-lg-block">
                                <button type="submit" class="btn border-0 bg-principal float-right py-2 px-3 btn-sm rounded-pill">Registrar</button>
                                <a href="/admin/administradores" class="btn btn-sm btn-default float-right py-2 px-3 mr-2 rounded-pill">Regresar</a>
                            </div>

                            <div class="col-12 text-center d-flex justify-content-center mt-2 d-block d-lg-none">
                                <div>
                                    <a href="/admin/administradores" class="btn btn-xs btn-default py-2 px-3 rounded-pill mr-2">Regresar</a>
                                </div>
                                <div>
                                    <button type="submit" class="btn border-0 bg-principal py-2 px-3 btn-xs rounded-pill">Registrar</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>