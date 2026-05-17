package service;

import jakarta.xml.ws.Endpoint;

public class ServeurWS {
    public static void main(String[] args) {
        String url = "http://localhost:8081/CalculatriceWS";
        Endpoint.publish(url, new CalculatriceWS());
        System.out.println("---------------------------------------------------------");
        System.out.println("Web service successfully published!");
        System.out.println("WSDL URL: " + url + "?wsdl");
        System.out.println("---------------------------------------------------------");
    }
}
