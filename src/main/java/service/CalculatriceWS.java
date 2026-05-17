package service;

import jakarta.jws.WebMethod;
import jakarta.jws.WebParam;
import jakarta.jws.WebService;

@WebService(serviceName = "calculatrice")
public class CalculatriceWS {
    public CalculatriceWS() {
    }

    @WebMethod(operationName = "somme")
    public double somme(@WebParam double a, @WebParam double b) {
        return a + b;
    }
}
